<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'phone' => 'nullable|string|max:20',
            'student_id' => 'required|string|unique:students',
            'address' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'joined_date' => 'nullable|date',
            'status' => 'required|in:active,inactive',
        ]);

        Student::create($validated);
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'student_id' => 'required|string|unique:students,student_id,' . $id,
            'address' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'joined_date' => 'nullable|date',
            'status' => 'required|in:active,inactive',
        ]);

        $student->update($validated);
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }

    public function enrollCourse(Request $request, $student)
    {
        $student = Student::findOrFail($student);

        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        $student->enrollInCourse($validated['course_id']);
        return redirect()->back()->with('success', 'Student enrolled successfully.');
    }

    public function unenrollCourse($student, $course)
    {
        $student = Student::findOrFail($student);
        $enrollment = $student->enrollments()->where('course_id', $course)->first();

        if ($enrollment) {
            $enrollment->delete();
            $student->decrement('total_enrollments');
        }

        return redirect()->back()->with('success', 'Student unenrolled successfully.');
    }
}
