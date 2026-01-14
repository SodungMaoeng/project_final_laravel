<?php
// app/Models/Course.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'short_description',
        'instructor_id',
        'category',
        'level',
        'price',
        'discount_price',
        'duration',
        'lessons_count',
        'students_enrolled',
        'rating',
        'reviews_count',
        'thumbnail',
        'objectives',
        'requirements',
        'is_featured',
        'is_published',
        'status'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'rating' => 'decimal:2',
        'objectives' => 'array',
        'requirements' => 'array',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    public function activeEnrollments(): HasMany
    {
        return $this->enrollments()->active();
    }

    public function getCurrentPriceAttribute()
    {
        return $this->discount_price ?? $this->price;
    }

    public function getIsDiscountedAttribute()
    {
        return !is_null($this->discount_price) && $this->discount_price < $this->price;
    }

    public function getDiscountPercentageAttribute()
    {
        if (!$this->is_discounted) return 0;

        return round((($this->price - $this->discount_price) / $this->price) * 100);
    }

    public function updateRating()
    {
        // This would typically calculate from reviews
        // For now, we'll just return the current rating
        return $this->rating;
    }
}
