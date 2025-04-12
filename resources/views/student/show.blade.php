@extends('layouts.students')

@section('content')
<div class="container">
    <h1>{{ $course->title }}</h1>
    <img src="{{ asset('storage/' . $course->image) }}" class="img-fluid mb-4" style="max-width: 300px; height: auto;" alt="{{ $course->title }}">
    <p>{{ $course->description }}</p>
    <p> <a href="{{ asset('storage/' . $course->media) }}" class="btn btn-secondary" download> Download Document</a> </p>
   
    
</div>
@endsection

