@extends('layouts.app')


@push('style')

    <style>
        /* Apply to the entire page body */
/* Body background */
body {
    background-color: #f9fafb; /* soft light background */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Container padding (less than default) */
.home-container {
    padding-top: 60px;
    padding-bottom: 60px;
    text-align: center;
}

/* Title */
.home-title {
    font-weight: 700;
    font-size: 2.5rem;
    line-height: 1.3;
    color: #212529;
    margin-bottom: 20px;
}

/* Subtitle */
.home-subtitle {
    font-size: 1.125rem;
    color: wheat;
    margin-bottom: 30px;
}

/* Button styles */
.home-buttons a.btn {
    padding: 10px 24px;
    font-size: 1rem;
    font-weight: 500;
    border-radius: 6px;
}

.home-buttons .btn-primary {
    background-color: #0d6efd;
    border-color: #0d6efd;
}

.home-buttons .btn-outline-secondary {
    border-color: #6c757d;
    color: #6c757d;
}

.home-buttons .btn-outline-secondary:hover {
    background-color: #6c757d;
    color: #fff;
}

.card-img-top {
    background: linear-gradient(to bottom right, #e9ecef, #f8f9fa);
}


    </style>
@endpush

@section('content')
<div class="home-container" style="background-image: url('{{ asset('assests/image/bg-image.png') }}'); background-size: cover; background-position: center; height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: left; text-align: center; color: #fff;">
   
    <p class="home-subtitle" style="font-size: 1.5rem; text-shadow: 2px 2px 5px rgba(242, 236, 236, 0.91); margin-bottom: 40px;">
        Your gateway to online education.
    </p>

    <div class="home-buttons d-flex justify-content-center gap-3">
        <a href="{{ route('course') }}" class="btn btn-primary" style="font-size: 1.2rem; padding: 12px 24px; background-color:rgb(22, 80, 141); border-color: #007BFF; border-radius: 25px;">
            Browse Courses
        </a>
        <a href="{{ route('register') }}" class="btn btn-outline-secondary" style="font-size: 1.2rem; padding: 12px 24px; background-color: rgb(22, 80, 141);; border-color: #007BFF; border-radius: 25px; color:rgb(231, 235, 239);">
            Get Started
        </a>
    </div>
</div>



<div class="container my-5">
    <h4 class="mb-4 fw-semibold text-center">Featured Courses</h4>

    <div class="row justify-content-center g-4">
        
    @foreach($courses as $course)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $course->image) }}" class="card-img-top" alt="{{ $course->title }}">
                    <div class="card-body">
                        <h5 class="card-title">  <span style="font-weight:bold">Title:  {{ $course->title }}</span></h5><br>
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
</div>


@endsection




@push('script')

    <script>
  
        
    </script>
@endpush