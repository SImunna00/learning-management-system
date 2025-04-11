@extends('layouts.instructors')

@section('title', 'Create Course')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-info text-white">
            <h4>Create New Course</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('instructor.courses.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="instructor_id" value="{{ auth()->user()->id }}">

                <div class="mb-3">
                    <label class="form-label fw-bold">Course Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter course title" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Course Code</label>
                    <input type="text" name="course_code" class="form-control" placeholder="e.g. CS101" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Description</label>
                    <textarea name="description" class="form-control" rows="4" placeholder="Enter course description" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Course Thumbnail</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Media / Resources (PDF, DOC, Video, etc.)</label>
                    <input type="file" name="media" class="form-control" accept="application/pdf,video/*,.doc,.docx,.ppt,.pptx">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-info text-white fw-bold">Create Course</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
