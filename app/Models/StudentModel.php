<?php

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
        'joined_date'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'joined_date' => 'date',
    ];

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    public function getProgressAttribute()
    {
        $total = $this->enrollments->count();
        $completed = $this->enrollments->where('status', 'completed')->count();

        return $total > 0 ? round(($completed / $total) * 100) : 0;
    }
}
