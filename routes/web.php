<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('index');
});

Route::get('/teacher-index', [TeacherController::class, 'index'])->name('teachers.index');

Route::get('student-index', [StudentController::class, 'index'])->name('students.index');
Route::get('student-create', [StudentController::class, 'create'])->name('students.create');
Route::post('student-store',[StudentController::class, 'store'])->name('students.store');
Route::get('student-edit/{id}',[StudentController::class, 'edit'])->name('students.edit');
Route::put('student-update/{id}',[StudentController::class, 'update'])->name('students.update');
Route::delete('student-destroy/{id}',[StudentController::class, 'destroy'])->name('students.destroy');

Route::resource('course', CourseController::class);

Route::resource('setting', SettingController::class);

Route::resource('course', CourseController::class);

// Route::get('/course-indexCourseController::class);

// Route::get('/student-index', [StudentController::class, 'index'])->name('student.index');
