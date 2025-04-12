@extends('layouts.instructors')

@section('title', 'Instructor Dashboard')

@section('content')
    <div class="container">
        <h1>Instructor Dashboard</h1>

        <div class="row">
            @foreach ($courses as $course)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top" alt="{{ $course->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5> <br>
                            
                             <!-- This will show the course ID -->
                            <!-- View Enrolled Students Button -->

                            <a href="{{ route('instructor.view.students', ['courseId' => $course->id]) }}" class="btn btn-info">
    View Enrolled Students ({{ $course->students->count() }})
</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection