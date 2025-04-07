<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructorController extends Controller
{
    //
    public function manage_courses()
    {
        return view('instructor.manage-courses');
    }

    public function manage_assignments()
    {
        return view('instructor.manage-assignments');
    }

    public function view_students()
    {
        return view('instructor.view-students');
    }
}
