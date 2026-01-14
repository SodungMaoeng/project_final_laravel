<?php
// database/seeders/EnrollmentSeeder.php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
    public function run()
    {
        $students = Student::limit(10)->get();
        $courses = Course::limit(20)->get();

        foreach ($students as $student) {
            // Each student enrolls in 2-5 random courses
            $randomCourses = $courses->random(rand(2, 5));

            foreach ($randomCourses as $course) {
                Enrollment::create([
                    'student_id' => $student->id,
                    'course_id' => $course->id,
                    'enrollment_date' => now()->subDays(rand(1, 90)),
                    'status' => $this->randomStatus(),
                    'progress' => rand(0, 100),
                    'grade' => $this->randomGrade(),
                    'notes' => rand(0, 1) ? 'Test enrollment data' : null,
                ]);
            }
        }

        // Update counters
        $this->updateCounters();
    }

    private function randomStatus()
    {
        $statuses = ['active', 'completed', 'dropped', 'pending'];
        return $statuses[array_rand($statuses)];
    }

    private function randomGrade()
    {
        return rand(0, 1) ? rand(50, 100) : null;
    }

    private function updateCounters()
    {
        // Update student counters
        $students = Student::all();
        foreach ($students as $student) {
            $student->update([
                'total_enrollments' => $student->enrollments()->count(),
                'completed_courses' => $student->enrollments()->completed()->count(),
            ]);
        }

        // Update course counters
        $courses = Course::all();
        foreach ($courses as $course) {
            $course->update([
                'students_enrolled' => $course->enrollments()->count(),
            ]);
        }
    }
}
