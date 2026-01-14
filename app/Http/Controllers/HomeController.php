<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Option 1: Get all courses (no status filter)
        $courses = Course::orderBy('created_at', 'desc')->get();

        // Option 2: Check if status column exists before using it
        // $courses = Course::when(
        //     Schema::hasColumn('courses', 'status'),
        //     function ($query) {
        //         return $query->where('status', 'active');
        //     },
        //     function ($query) {
        //         return $query;
        //     }
        // )->orderBy('created_at', 'desc')->get();

        return view('home', compact('courses'));
    }
}
