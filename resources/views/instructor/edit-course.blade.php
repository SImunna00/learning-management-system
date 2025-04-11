@extends('layouts.instructors')

@section('title', 'Edit Course')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-warning text-white">
            <h4>Edit Course</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('instructor.course.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold">Course Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $course->title) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Course Code</label>
                    <input type="text" name="course_code" class="form-control" value="{{ old('course_code', $course->course_code) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Description</label>
                    <textarea name="description" class="form-control" rows="4" required>{{ old('description', $course->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Current Image</label><br>
                    @if($course->image)
                        <img src="{{ asset('storage/' . $course->image) }}" width="120" class="img-thumbnail mb-2">
                    @else
                        <p class="text-muted">No image uploaded.</p>
                    @endif
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Media/Resource</label><br>
                    @if($course->media)
                        <a href="{{ asset('storage/' . $course->media) }}" target="_blank">View Current Media</a>
                    @else
                        <p class="text-muted">No media uploaded.</p>
                    @endif
                    <input type="file" name="media" class="form-control mt-2">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-warning text-white fw-bold">Update Course</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this course!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endpush


