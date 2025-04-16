<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Course;

class CourseController extends Controller
{
    // Display all courses managed by the instructor
    public function manage_courses()
    {
        $instructorId = auth()->user()->id;  // Get instructor's ID from authenticated user
        $all_courses = Course::where('instructor_id', $instructorId)->get();  // Fetch courses belonging to this instructor
        return view('instructor.manage-courses', compact('all_courses'));  // Return the view with courses data
    }

    // Display form to create a new course
    public function create()
    {
        return view('instructor.create-course');
    }

    // Store a newly created course in the database
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'course_code' => 'required|string|max:100|unique:courses',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'media' => 'nullable|file|max:10240',
            'instructor_id' => 'required|exists:users,id',
        ]);

        // Prepare data for storing
        $data = $request->only(['title', 'course_code', 'description', 'instructor_id', 'image', 'media']);

        // Handle image upload if exists
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('courses/images', 'public');
        }

        // Handle media upload if exists
        if ($request->hasFile('media')) {
            $data['media'] = $request->file('media')->store('courses/media', 'public');
        }

        // Create the course with the validated data
        Course::create($data);

        // Redirect to course management page with success message
        return redirect()->route('instructor.manage.courses')->with('success', 'Course created successfully!');
    }

    // Display the form to edit an existing course
    public function edit($id)
    {
        $course = Course::findOrFail($id);  // Find the course by ID
        return view('instructor.edit-course', compact('course'));  // Pass course to the view
    }

    // Update an existing course
    public function update(Request $request, $id)
    {
        // Validate incoming request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'course_code' => 'required|string|max:100',
            'description' => 'required|string',
            'media' => 'nullable|file|max:5120', // Media validation
            'image' => 'nullable|image|max:2048' // Image validation
        ]);

        // Find the course by ID
        $course = Course::findOrFail($id);

        // Handle media file upload if exists
        if ($request->hasFile('media')) {
            // Delete old media if it exists
            if ($course->media && Storage::disk('public')->exists($course->media)) {
                Storage::disk('public')->delete($course->media);
            }
            // Store new media
            $mediaPath = $request->file('media')->store('courses/media', 'public');
            $validated['media'] = $mediaPath;  // Add media path to validated data
        }

        // Handle image file upload if exists
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($course->image && Storage::disk('public')->exists($course->image)) {
                Storage::disk('public')->delete($course->image);
            }
            // Store new image
            $imagePath = $request->file('image')->store('courses/images', 'public');
            $validated['image'] = $imagePath;  // Add image path to validated data
        }

        // Update the course with the validated data (including media and image paths if updated)
        $course->update($validated);

        // Redirect to course management page with success message
        return redirect()->route('instructor.manage.courses')->with('success', 'Course updated successfully');
    }

    // Delete a course from the database
    public function destroy($id)
    {
        $course = Course::findOrFail($id);  // Find the course by ID

        // Delete the image from storage if it exists
        if ($course->image && Storage::disk('public')->exists($course->image)) {
            Storage::disk('public')->delete($course->image);
        }

        // Delete the media from storage if it exists
        if ($course->media && Storage::disk('public')->exists($course->media)) {
            Storage::disk('public')->delete($course->media);
        }

        // Delete the course from the database
        $course->delete();

        // Redirect to course management page with success message
        return redirect()->route('instructor.manage.courses')->with('success', 'Course deleted successfully');
    }
}
