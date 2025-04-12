@extends('layouts.students')



@push('style')

    <style>
       

    </style>
@endpush

@section('content')



<div class="container mt-4">
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3 ">
            <div class="breadcrumb-title pe-3">Dashboard</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">My courses</li>
                    </ol>
                </nav>
            </div>

        </div>

    <div class="row">
        @foreach($enrolledCourses as $enrollment)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('storage/' . $enrollment->course->image) }}" class="card-img-top" alt="Course Image">
                    <div class="card-body">
                        
                        <h5 class="card-title fw-bold">{{ $enrollment->course->title }}</h5><br>
                        <p class="card-text text-justify">{{ $enrollment->course->description }}</p>
                        <a href="{{ route('student.course.show', $enrollment->course->id) }}" class="btn btn-primary">View Course</a>
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