@extends('layouts.student-home')
@section('title', 'Available courses')

@section('content')
    <div class="container">
    
    <h4 class="mb-4 fw-semibold text-center">Available Courses</h4>

    <div class="row justify-content-center g-4">
        @foreach ($courses as $course)
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <!-- Display course thumbnail -->
                <div class="card-img-top bg-light" style="height: 120px; border-radius: 6px; background-image: url('{{ asset('storage/' . $course->image) }}'); background-size: cover; background-position: center;"></div>

                <div class="card-body text-center">
                    <h6 class="card-title fw-bold">{{ $course->title }}</h6>
                    <p class="card-text text-muted">{{ Str::limit($course->description, 80) }}</p>
                    <!-- Enroll button -->
                    <form action="{{ route('student.course.enroll', $course->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Enroll</button>
            </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

            
    </div>
@endsection