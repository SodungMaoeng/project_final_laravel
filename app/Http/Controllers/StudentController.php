<?php
// app/Models/Student.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'student_id',
        'profile_image',
        'status',
        'address',
        'date_of_birth',
        'joined_date',
        'total_enrollments',
        'completed_courses'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'joined_date' => 'date',
    ];

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    public function activeEnrollments(): HasMany
    {
        return $this->enrollments()->active();
    }

    public function completedEnrollments(): HasMany
    {
        return $this->enrollments()->completed();
    }

    public function enrollInCourse($courseId, $attributes = [])
    {
        $enrollment = $this->enrollments()->create(array_merge([
            'course_id' => $courseId,
            'enrollment_date' => now(),
            'status' => 'active',
        ], $attributes));

        $this->increment('total_enrollments');

        // Update course enrollment count
        if ($course = Course::find($courseId)) {
            $course->increment('students_enrolled');
        }

        return $enrollment;
    }

    public function getProgressAttribute()
    {
        $total = $this->enrollments->count();
        $completed = $this->enrollments->where('status', 'completed')->count();

        return $total > 0 ? round(($completed / $total) * 100) : 0;
    }

    public function getAverageGradeAttribute()
    {
        $completedEnrollments = $this->enrollments()->completed()->whereNotNull('grade')->get();

        if ($completedEnrollments->isEmpty()) return null;

        return $completedEnrollments->avg('grade');
    }
}
