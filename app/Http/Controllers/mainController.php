<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    // Show all available courses (open to all users)
    public function index()
    {
        $courses = Course::all(); // Get all from the  courses course
        return view('home', compact('courses')); // Return the homepage with courses
    }

    public function course()
    {
        $courses = Course::all(); // Get all courses
        return view('courses', compact('courses'));
    }
    // Show course details (open to all users)
    public function show($id)
    {
        $course = Course::findOrFail($id); // Find course by ID
        return view('show', compact('course')); // Return the course details page
    }

    // Enroll in a course (only for authenticated users)
    public function enroll($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to log in to enroll in this course.');
        }

        $course = Course::findOrFail($id); // Find course by ID
        $user = Auth::user(); // Get the authenticated user

        // Check if user is already enrolled in the course
        if ($user->enrollments->contains($course)) {
            return redirect()->route('home')->with('info', 'You are already enrolled in this course.');
        }

        // Enroll user in the course
        $user->enrollments()->attach($course);

        return redirect()->route('home')->with('success', 'You have successfully enrolled in the course!');
    }
}

