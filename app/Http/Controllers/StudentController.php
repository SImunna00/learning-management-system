<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;

class StudentController extends Controller
{
   

    public function profile()
    {
       
        return view('student.profile');  // 
    }


    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:15',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',  // Validate photo upload
        ]);
        $data = $request->only(['name', 'email', 'phone','photo']);

        

         // If a new photo is uploaded, store it and add the path to the data array
         if ($request->hasFile('photo')) {

          
            
            $photoPath = $request->file('photo')->store('profile_photos', 'public'); // Store in the 'profile_photos' directory
            $data['photo'] = $photoPath;
        }

    
        // Update the user's profile in the database
        $user->update($data);

        // Redirect back with a success message
        return redirect()->route('student.profile')->with('success', 'Profile updated successfully');
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required', // Validate current password
            'new_password' => 'required|min:8|confirmed', // Validate new password with confirmation
        ]);

        // Check if the current password matches the user's stored password
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            // If passwords don't match, return with an error
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        // Update the password if the current password is correct and the new passwords match
        Auth::user()->update([
            'password' => Hash::make($request->new_password), // Hash the new password before saving it
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Password updated successfully.');
    
    }


    public function home()
    {
        return view('student.home');
    }

    public function available_course()
    {
        $courses = Course::all();  
        return view('student.available-course',compact('courses'));
    }

    public function enroll($courseId)
    {
        $student = auth()->user(); // Get the authenticated student

        // Check if the student is already enrolled in the course
        $existingEnrollment = Enrollment::where('user_id', $student->id)
                                        ->where('course_id', $courseId)
                                        ->first();

        if ($existingEnrollment) {
            return redirect()->back()->with('error', 'You are already enrolled in this course.');
        }

        // Enroll the student
        Enrollment::create([
            'user_id' => $student->id,
            'course_id' => $courseId,
        ]);

        return redirect()->route('student.dashboard')->with('success', 'You have successfully enrolled in the course.');
    }

    // Display the student's enrolled courses (Dashboard)
    public function dashboard()
    {
        $student = auth()->user(); // Get the authenticated student

        // Get all the courses the student is enrolled in
        $enrolledCourses = $student->enrollments()->with('course')->get();

        return view('student.dashboard', compact('enrolledCourses'));
    }


    public function courses()
    {   
        $student = auth()->user();  
        $enrolledCourses = $student->enrollments()->with('course')->get();
        return view('student.courses', compact('enrolledCourses'));
    }

    public function show($id)
{
    $course = Course::findOrFail($id); // Fetch the course by ID
    return view('student.show', compact('course')); // Return the view with course details
}

}
