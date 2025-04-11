@extends('layouts.instructors')

@section('title', 'Manage Courses')

@section('content')

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Course</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">All Courses</li>
            </ol>
        </nav>
    </div>
</div>

<div style="display: flex; align-items:center; justify-content:space-between">
    <h6 class="mb-0 text-uppercase">All Courses</h6>
    <a href="{{ route('instructor.course.create') }}" class="btn btn-primary">Add Course</a>
</div>
<hr />
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Course Name</th>
                            <th>Course Code</th>
                            <th>Thumbnail</th>
                            <th>Description</th>
                            <th>Resource</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all_courses as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->course_code }}</td>
                                <td>
                                    @if($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" width="100" height="60" alt="Course Image">
                                    @else
                                        <span class="text-muted">No image</span>
                                    @endif
                                </td>
                                <td>{{ \Illuminate\Support\Str::limit($item->description, 60) }}</td>
                                <td>
                                    @if($item->media)
                                        <a href="{{ asset('storage/' . $item->media) }}" class="btn btn-sm btn-info" target="_blank">View</a>
                                    @else
                                        <span class="text-muted">No media</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('instructor.course.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form id="delete-form-{{ $item->id }}" action="{{ route('instructor.course.destroy', $item->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $item->id }})">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
function confirmDelete(courseId) {
    if (confirm("Are you sure you want to delete this course? This action cannot be undone.")) {
        document.getElementById('delete-form-' + courseId).submit();
    }
}
</script>
@endpush