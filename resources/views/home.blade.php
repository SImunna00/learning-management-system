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
    color: #555;
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


<div class="container home-container">
    <h1 class="home-title">Welcome to the<br>Learning Management System</h1>
    <p class="home-subtitle">Your gateway to online education.</p>

    <div class="home-buttons d-flex justify-content-center gap-3">
        <a href="#" class="btn btn-primary">Browse Courses</a>
        <a href="{{ route('register') }}" class="btn btn-outline-secondary">Get Started</a>
    </div>
</div>


<div class="container my-5">
    <h4 class="mb-4 fw-semibold text-center">Featured Courses</h4>

    <div class="row justify-content-center g-4">
        
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-img-top bg-light" style="height: 120px; border-radius: 6px;"></div>
                    <div class="card-body text-center">
                        <h6 class="card-title fw-bold">Course Title</h6>
                        <p class="card-text text-muted">Short description of the course.</p>
                        <a href="#" class="btn btn-primary btn-sm">Manage Course</a>
                    </div>
                </div>
            </div>


         
      
    </div>
</div>


@endsection




@push('script')

    <script>
  
        
    </script>
@endpush