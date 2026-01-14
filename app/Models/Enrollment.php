<?php
// app/Models/Enrollment.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enrollment extends Model
{
    protected $fillable = [
        'student_id',
        'course_id',
        'enrollment_date',
        'completion_date',
        'status',
        'progress',
        'grade',
        'notes'
    ];

    protected $casts = [
        'enrollment_date' => 'date',
        'completion_date' => 'date',
        'progress' => 'decimal:2',
        'grade' => 'decimal:2',
    ];

    protected $attributes = [
        'status' => 'active',
        'progress' => 0.00,
    ];

    // Relationships
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeDropped($query)
    {
        return $query->where('status', 'dropped');
    }

    // Methods
    public function markAsCompleted($grade = null, $completionDate = null)
    {
        $this->update([
            'status' => 'completed',
            'progress' => 100.00,
            'grade' => $grade,
            'completion_date' => $completionDate ?? now(),
        ]);

        // Update student's completed courses count
        $this->student->increment('completed_courses');
    }

    public function updateProgress($progress)
    {
        $this->update(['progress' => min(100, max(0, $progress))]);

        if ($this->progress >= 100 && $this->status !== 'completed') {
            $this->markAsCompleted();
        }
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'active' => 'success',
            'completed' => 'primary',
            'pending' => 'warning',
            'dropped' => 'danger',
            default => 'secondary',
        };
    }

    public function getProgressColorAttribute()
    {
        if ($this->progress < 30) return 'danger';
        if ($this->progress < 70) return 'warning';
        if ($this->progress < 100) return 'info';
        return 'success';
    }

    public function getDurationAttribute()
    {
        if (!$this->enrollment_date) return null;

        $endDate = $this->completion_date ?? now();
        return $this->enrollment_date->diffInDays($endDate);
    }
}
