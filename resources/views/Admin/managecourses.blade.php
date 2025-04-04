@extends('Admin.layots.main')

@section('title', 'Manage Courses')

@section('main-container')
<link rel="stylesheet" href="{{asset('Admin/css/management.css')}}">
<main>
    <section id="manage-courses" style="margin-left: 100px">
        <div class="container">
            <h2>Manage Courses</h2>
          <a href="{{route('courses.add')}}">  <button class="btn btn-success"  >Add New Course</button></a>
            <br>
            <br>
    
            <div class="courses-list">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Course Name</th>
                            <th>Description</th>
                            <th>Syllabus</th>
                            <th>Instructor</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example course entry; Dynamically populate this table from the database -->
                        @foreach ($course as $cou )


                        <tr>
                            <td>{{$cou->id ?? ""}}</td>
                            <td>{{$cou->name ?? ""}}</td>
                            <td>{{$cou->description ?? ""}}</td>
                            <td>{{$cou->syllabus ?? ""}}</td>
                            <td>{{$cou->instructor->name ?? ""}}</td>
                            <td>{{$cou->status ===1 ? "Active" : "Inactive"}}</td>
                            <td>
                                <button onclick="toggleEditForm({{ $cou->id }})" class="btn btn-primary edit-btn" ><i class="fas fa-edit"></i></button>

                                <div style="display: inline-block;">

                                    <form action="{{ route('course.delete', $cou->id) }}"  method="POST" onsubmit="return confirm('Are you sure you want to delete this coutructor?');">
                                        @csrf
                                        @method('DELETE')
                                <button class="btn btn-danger delete-btn" ><i class="fas fa-trash"></i></button>
                                    </form>
                            </div>

                            </td>
                        </tr>

                        <tr id="edit-form-{{ $cou->id }}" class="edit-form" style="display: none;">
                            <td colspan="6">
                                <form action="{{ route('course.update', $cou->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="course_id" value="1">
                                    <div class="mb-3">
                                        <label class="form-label">Course Name:</label>
                                        <input type="text" class="form-control" name="course_name" value="{{ $cou->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Course Description:</label>
                                        <textarea class="form-control" name="course_description" value="{{ $cou->name }}" required>{{ $cou->description ?? "" }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Course Syllabus:</label>
                                        <textarea class="form-control" name="course_syllabus" value="{{ $cou->syllabus }}" required>{{ $cou->syllabus ?? "" }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Assign coutructor:</label>
                                        <select class="form-control" name="coutructor_id" required>
                                            <option value="1" selected>{{ $cou->instructor->name ?? "" }}</option>

                                            @foreach ($instructor as $ins)


                                            <option value="{{ $ins->id  }}">{{ $ins->name ?? "" }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Status:</label>
                                        <select name="status" class="form-control">
                                            <option value="1" {{ $cou->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $cou->status == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Course</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </section>
</main>

<script>
    function toggleEditForm(courseId) {
        var editForm = document.getElementById('edit-form-' + courseId);
        editForm.style.display = (editForm.style.display === 'none' || editForm.style.display === '') ? 'table-row' : 'none';
    }

    function toggleAddForm() {
        var addForm = document.getElementById('add-form');
        addForm.style.display = (addForm.style.display === 'none' || addForm.style.display === '') ? 'block' : 'none';
    }

    function deleteCourse(courseId) {
        if (confirm('Are you sure you want to delete this course?')) {
            // Here you should send an AJAX request or form submission to delete the course
            // Example: window.location.href = "/delete-course/" + courseId;
        }
    }
</script>

@endsection
