<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

// Home page
Route::get('/', function () {
    return view('home');
});

// Authenticated routes
Route::middleware(['auth'])->group(function () {

    // Smart dashboard redirect
    Route::get('/dashboard', function () {
        return auth()->user()->role === 'instructor'
            ? redirect()->route('instructor.dashboard')
            : redirect()->route('student.dashboard');
    })->name('dashboard');

    //  *** *** *** Student routes *** *** ***-------------------//

    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');

    Route::get('/student/home',[StudentController::class,'home'])->name('student.home');

    Route::get('/student/courses', [StudentController::class, 'courses'])->name('student.courses');
    
    Route::get('/student/profile', [StudentController::class, 'profile'])->name('student.profile');

    Route::post('/student/profile', [StudentController::class, 'store'])->name('student.profile.store');

    Route::get('/student/settings', fn () => view('student.settings'))->name('student.settings');

    Route::post('/student/settings', [StudentController::class, 'updatePassword'])->name('student.passwordSetting');

    Route::get('/student/available-course',
    [StudentController::class,'available_course']
    )->name('student.available.course');

    Route::post('/student/courses/{id}/enroll', [StudentController::class, 'enroll'])->name('student.course.enroll');

    //  *** *** *** Student routes *** *** ***-------------------//

    /*          *** *** *** Instructor      *** *** ***                            */
    // Instructor dashboard
    Route::get('/instructor/dashboard', fn () => view('instructor.dashboard'))->name('instructor.dashboard');
    
    // Instructor features
    Route::get('/instructor/manage-assignments', [InstructorController::class, 'manage_assignments'])->name('instructor.manage.assignments');

    Route::get('/instructor/view-students', [InstructorController::class, 'view_students'])->name('instructor.view.students');

    Route::get('/instructor/profile', [InstructorController::class, 'profile'])->name('instructor.profile');

    Route::post('/instructor/profile', [InstructorController::class, 'updateProfile'])->name('instructor.profile.store');

    // Password setting
    Route::get('/instructor/settings', fn () => view('instructor.settings'))->name('instructor.settings');
    
    Route::post('/instructor/settings', [InstructorController::class, 'updatePassword'])->name('instructor.passwordSetting');


    /*          *** *** *** Instructor      *** *** ***                            */
});

// Laravel Breeze profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Instructor course management
Route::prefix('instructor')->middleware('auth')->group(function () {
    Route::get('/manage-courses', [CourseController::class, 'manage_courses'])->name('instructor.manage.courses');
    
    Route::get('/courses/create', [CourseController::class, 'create'])->name('instructor.course.create');

    Route::post('/courses', [CourseController::class, 'store'])->name('instructor.courses.store');
    
    Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('instructor.course.edit');
    Route::put('/courses/{id}', [CourseController::class, 'update'])->name('instructor.course.update');

    Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('instructor.course.destroy');
});

require __DIR__.'/auth.php';
