@extends('layouts.students')

@section('title', 'My Courses')

@section('content')
<div class="container mt-4">
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3 ">
            <div class="breadcrumb-title pe-3">My Courses</div>
           

        </div>

    <div class="row">
        @foreach($enrolledCourses as $enrollment)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('storage/' . $enrollment->course->image) }}" class="card-img-top" alt="Course Image">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $enrollment->course->title }}</h5><br>
                        <p class="card-text">{{ $enrollment->course->description }}</p>
                        <a href="{{ route('student.course.show', $enrollment->course->id) }}" class="btn btn-primary">View Course</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
