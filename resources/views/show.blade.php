
@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="my-4">{{ $course->title }}</h1>
    <img src=" {{ asset('storage/' . $course->image) }}" class="img-fluid mb-4" style="max-width: 300px; height: auto;" alt="{{ $course->title }}">
    <p>{{ $course->description }}</p>
    <p> <a href="{{ asset('storage/' . $course->media) }}" class="btn btn-secondary" download> Download Document</a> </p>

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

@endsection
