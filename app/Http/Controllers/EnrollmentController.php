<?php
// app/Http/Controllers/EnrollmentController.php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnrollmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Enrollment::with(['student', 'course'])
            ->latest('enrollment_date');

        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('student', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            })->orWhereHas('course', function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Filter by date
        if ($request->has('date_from')) {
            $query->whereDate('enrollment_date', '>=', $request->date_from);
        }
        if ($request->has('date_to')) {
            $query->whereDate('enrollment_date', '<=', $request->date_to);
        }

        $enrollments = $query->paginate(20);

        $stats = [
            'total' => Enrollment::count(),
            'active' => Enrollment::active()->count(),
            'completed' => Enrollment::completed()->count(),
            'pending' => Enrollment::pending()->count(),
            'dropped' => Enrollment::dropped()->count(),
        ];

        return view('enrollments.index', compact('enrollments', 'stats'));
    }

    public function create()
    {
        $students = Student::active()->get();
        $courses = Course::published()->get();

        return view('enrollments.create', compact('students', 'courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'enrollment_date' => 'required|date',
            'status' => 'required|in:active,pending',
            'notes' => 'nullable|string|max:500',
        ]);

        // Check if enrollment already exists
        $existingEnrollment = Enrollment::where('student_id', $validated['student_id'])
            ->where('course_id', $validated['course_id'])
            ->first();

        if ($existingEnrollment) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'This student is already enrolled in this course.');
        }

        try {
            DB::beginTransaction();

            $enrollment = Enrollment::create($validated);

            // Update student's total enrollments
            Student::where('id', $validated['student_id'])->increment('total_enrollments');

            // Update course's enrolled students count
            Course::where('id', $validated['course_id'])->increment('students_enrolled');

            DB::commit();

            return redirect()->route('enrollments.index')
                ->with('success', 'Enrollment created successfully.');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create enrollment: ' . $e->getMessage());
        }
    }

    public function show(Enrollment $enrollment)
    {
        $enrollment->load(['student', 'course']);

        return view('enrollments.show', compact('enrollment'));
    }

    public function edit(Enrollment $enrollment)
    {
        $enrollment->load(['student', 'course']);
        $statuses = ['active', 'completed', 'dropped', 'pending'];

        return view('enrollments.edit', compact('enrollment', 'statuses'));
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $validated = $request->validate([
            'status' => 'required|in:active,completed,dropped,pending',
            'progress' => 'nullable|numeric|min:0|max:100',
            'grade' => 'nullable|numeric|min:0|max:100',
            'completion_date' => 'nullable|date|required_if:status,completed',
            'notes' => 'nullable|string|max:500',
        ]);

        try {
            DB::beginTransaction();

            $oldStatus = $enrollment->status;
            $newStatus = $validated['status'];

            // If marking as completed, set completion date and progress to 100%
            if ($newStatus === 'completed' && $oldStatus !== 'completed') {
                $validated['completion_date'] = $validated['completion_date'] ?? now();
                $validated['progress'] = 100.00;

                // Update student's completed courses count
                $enrollment->student->increment('completed_courses');
            }

            // If changing from completed to another status, decrement completed count
            if ($oldStatus === 'completed' && $newStatus !== 'completed') {
                $enrollment->student->decrement('completed_courses');
            }

            $enrollment->update($validated);

            DB::commit();

            return redirect()->route('enrollments.index')
                ->with('success', 'Enrollment updated successfully.');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update enrollment: ' . $e->getMessage());
        }
    }

    public function destroy(Enrollment $enrollment)
    {
        try {
            DB::beginTransaction();

            // Update counters before deletion
            if ($enrollment->student) {
                $enrollment->student->decrement('total_enrollments');

                if ($enrollment->status === 'completed') {
                    $enrollment->student->decrement('completed_courses');
                }
            }

            if ($enrollment->course) {
                $enrollment->course->decrement('students_enrolled');
            }

            $enrollment->delete();

            DB::commit();

            return redirect()->route('enrollments.index')
                ->with('success', 'Enrollment deleted successfully.');

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()
                ->with('error', 'Failed to delete enrollment: ' . $e->getMessage());
        }
    }

    public function bulkUpdate(Request $request)
    {
        $request->validate([
            'enrollment_ids' => 'required|array',
            'enrollment_ids.*' => 'exists:enrollments,id',
            'action' => 'required|in:complete,drop,delete',
        ]);

        $count = 0;
        $failed = 0;

        foreach ($request->enrollment_ids as $enrollmentId) {
            try {
                $enrollment = Enrollment::findOrFail($enrollmentId);

                switch ($request->action) {
                    case 'complete':
                        $enrollment->markAsCompleted();
                        $count++;
                        break;
                    case 'drop':
                        $enrollment->update(['status' => 'dropped']);
                        $count++;
                        break;
                    case 'delete':
                        $enrollment->delete();
                        $count++;
                        break;
                }
            } catch (\Exception $e) {
                $failed++;
            }
        }

        $message = "Successfully processed {$count} enrollment(s).";
        if ($failed > 0) {
            $message .= " Failed to process {$failed} enrollment(s).";
        }

        return redirect()->back()
            ->with('success', $message);
    }

    public function studentEnrollments(Student $student)
    {
        $enrollments = $student->enrollments()
            ->with('course')
            ->latest('enrollment_date')
            ->paginate(10);

        return view('students.enrollments', compact('student', 'enrollments'));
    }

    public function courseEnrollments(Course $course)
    {
        $enrollments = $course->enrollments()
            ->with('student')
            ->latest('enrollment_date')
            ->paginate(15);

        return view('courses.enrollments', compact('course', 'enrollments'));
    }

    public function updateProgress(Request $request, Enrollment $enrollment)
    {
        $request->validate([
            'progress' => 'required|numeric|min:0|max:100',
        ]);

        $enrollment->updateProgress($request->progress);

        return response()->json([
            'success' => true,
            'message' => 'Progress updated successfully.',
            'progress' => $enrollment->progress,
            'status' => $enrollment->status,
        ]);
    }
}
