<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\InstructorController;

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth'])->group(function () {

    // Smart dashboard redirect based on role
    Route::get('/dashboard', function () {
        $role = auth()->user()->role;

        if ($role === 'instructor') {
            return redirect()->route('instructor.dashboard');
        }

        return redirect()->route('student.dashboard');
    })->name('dashboard');

    // Student routes
    Route::get('/student/dashboard', function () {
        return view('student.dashboard');
    })->name('student.dashboard');

    Route::get('/student/courses', [StudentController::class, 'courses'])->name('student.courses');
    Route::get('/student/profile', [StudentController::class, 'profile'])->name('student.profile');




    // Instructor 
    Route::get('/instructor/dashboard', function () {
        return view('instructor.dashboard');
    })->name('instructor.dashboard');

    
    Route::get('/instructor/manage-courses', [InstructorController::class, 'manage_courses'])->name('instructor.manage.courses');
    Route::get('/instructor/manage-assignments', [InstructorController::class, 'manage_assignments'])->name('instructor.manage.assignments');
    Route::get('/instructor/view-students', [InstructorController::class, 'view_students'])->name('instructor.view.students');


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
