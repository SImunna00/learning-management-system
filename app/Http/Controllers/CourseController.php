<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Course;
class CourseController extends Controller
{
    //

    public function manage_courses()
    {
        $instructorId = auth()->user()->id;
        $all_courses = Course::where('instructor_id', $instructorId)->get();
        return view('instructor.manage-courses', compact('all_courses'));
    }

    public function create()
    {
        return view('instructor.create-course');
    }

    public function store(Request $request)
    {
        // return response()->json($request->all());

        $request->validate([
            'title' => 'required|string|max:255',
            'course_code' => 'required|string|max:100|unique:courses',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'media' => 'nullable|file|max:10240',
            'instructor_id' => 'required|exists:users,id'
        ]);

        $data = $request->only(['title', 'course_code', 'description', 'instructor_id', 'image', 'media']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('courses/images', 'public');
        }

        if ($request->hasFile('media')) {
            $data['media'] = $request->file('media')->store('courses/media', 'public');
        }

        Course::create($data);

        // \Log::info('Course Data:', $data);

        //     return response()->json([
//         'message' => 'Course created successfully!',
//         'data' => $data
//    ]);

        return redirect()->route('instructor.manage.courses')->with('success', 'Course created successfully!');
    }

    //edit course
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('instructor.edit-course', compact('course'));
    }


    //update
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'course_code' => 'required|string|max:100',
            'description' => 'required',
            'media' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        $course = Course::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('course_images', 'public');
            $validated['image'] = $imagePath;
        }

        $course->update($validated);
        return redirect()->route('instructor.manage.courses')->with('success', 'Course updated successfully');
    }


    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        // Delete image from storage
        if ($course->image && \Storage::disk('public')->exists($course->image)) {
            \Storage::disk('public')->delete($course->image);
        }

        $course->delete();
        return redirect()->route('instructor.manage.courses')->with('success', 'Course deleted successfully');
    }


}
