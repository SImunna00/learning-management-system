@extends('layouts.instructors')

@section('title', 'Enrolled Students')

@section('content')
<div class="container">
    <h1>Enrolled Students for Course: {{ $course->title }}</h1>

    <p><strong>Total Students Enrolled: </strong>{{ $studentCount }}</p>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach($course->students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
