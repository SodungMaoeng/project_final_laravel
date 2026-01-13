<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseModel extends Model
{
    use SoftDeletes;

    protected $table = 'courses';

    protected $fillable = [
        'title',
        'description',
        'price',
        'discount',
        'image',
    ];
}
