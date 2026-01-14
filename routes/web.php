<?php

use Nette\Schema\Schema;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;

use App\Http\Controllers\SettingController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\EnrollmentController;

// Frontend routes
Route::get('/', [HomeController::class, 'index'])->name('home');
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

Route::get('/check-courses-table', function() {
    $columns = \Illuminate\Support\Facades\Schema::getColumnListing('courses');
    dd($columns);
});
// Route::get('/course-indexCourseController::class);

// Route::get('/student-index', [StudentController::class, 'index'])->name('student.index');
// routes/web.php

// Enrollment Routes
Route::resource('enrollments', EnrollmentController::class);

// Additional Enrollment Routes
Route::post('/enrollments/bulk-update', [EnrollmentController::class, 'bulkUpdate'])
    ->name('enrollments.bulk-update');

Route::post('/enrollments/{enrollment}/progress', [EnrollmentController::class, 'updateProgress'])
    ->name('enrollments.progress.update');

Route::get('/students/{student}/enrollments', [EnrollmentController::class, 'studentEnrollments'])
    ->name('students.enrollments');

Route::get('/courses/{course}/enrollments', [EnrollmentController::class, 'courseEnrollments'])
    ->name('courses.enrollments');

// Student Enrollment Management
Route::post('/students/{student}/enroll', [StudentController::class, 'enrollCourse'])
    ->name('students.enroll');

Route::delete('/students/{student}/unenroll/{course}', [StudentController::class, 'unenrollCourse'])
    ->name('students.unenroll');
