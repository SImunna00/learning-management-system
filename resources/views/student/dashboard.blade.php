@extends('layouts.students')



@push('style')

    <style>
       

    </style>
@endpush

@section('content')



<div class="container mt-4">
<h2>My courses</h2>

    <div class="row">
        @foreach($enrolledCourses as $enrollment)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('storage/' . $enrollment->course->image) }}" class="card-img-top" alt="Course Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $enrollment->course->title }}</h5>
                        <p class="card-text">{{ $enrollment->course->description }}</p>
                        <a href="#" class="btn btn-primary">View Course</a>
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