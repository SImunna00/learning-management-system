@extends('layouts.app')

@section('title', 'Courses')
@section('content')
<div class="row justify-content-center g-4">
        
        @foreach($courses as $course)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top" alt="{{ $course->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                            <a href="{{ route('course.show', $course->id) }}" class="btn btn-info">View Details</a>
    
                            <!-- Enroll button only available to logged-in users -->
                            @auth
                                @if(auth()->user()->enrollments->contains($course))
                                    <button class="btn btn-success" disabled>Already Enrolled</button>
                                @else
                                    <form action="{{ route('course.enroll', $course->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Enroll</button>
                                    </form>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-primary"> Enroll</a>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
    
    
             
          
        </div>


        @endsection