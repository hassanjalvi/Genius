@extends('Admin.layots.main')

@section('title', 'Manage Courses')

@section('main-container')
<link rel="stylesheet" href="{{asset('Admin/css/management.css')}}">
<main>
    <section id="manage-courses" style="margin-left: 100px">
        <div class="container">
            <h2>Manage Courses</h2>
            <button class="btn btn-success" href="{{route('courses.add')}}" >Add New Course</button>
            <br>
            <br>
            <div id="add-form" class="edit-form" style="display: none;">
                <form action="{{url('/addcourse')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Course Name:</label>
                        <input type="text" class="form-control" name="course_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Course Description:</label>
                        <textarea class="form-control" name="course_description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Course Syllabus:</label>
                        <textarea class="form-control" name="course_syllabus" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Assign Instructor:</label>
                        <select class="form-control" name="instructor_id" required>
                            <option value="">Select Instructor</option>
                            <!-- Dynamically fetch instructors here -->
                            <option value="1">John Doe</option>
                            <option value="2">Jane Smith</option>
                            <!-- Add more options based on available instructors -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Course</button>
                </form>
            </div>

            <div class="courses-list">
                <table class="table table-striped">
                    <thead>
                        <tr>
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
                        <tr>
                            <td>Introduction to Programming</td>
                            <td>A basic course on programming concepts</td>
                            <td>Basic programming concepts, data structures, and algorithms</td>
                            <td>John Doe</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-primary edit-btn" onclick="toggleEditForm(1)"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger delete-btn" onclick="deleteCourse(1)"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>

                        <tr id="edit-form-1" class="edit-form" style="display: none;">
                            <td colspan="6">
                                <form action="{{url('/updatecourse')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="course_id" value="1">
                                    <div class="mb-3">
                                        <label class="form-label">Course Name:</label>
                                        <input type="text" class="form-control" name="course_name" value="Introduction to Programming" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Course Description:</label>
                                        <textarea class="form-control" name="course_description" required>A basic course on programming concepts</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Course Syllabus:</label>
                                        <textarea class="form-control" name="course_syllabus" required>Basic programming concepts, data structures, and algorithms</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Assign Instructor:</label>
                                        <select class="form-control" name="instructor_id" required>
                                            <option value="1" selected>John Doe</option>
                                            <option value="2">Jane Smith</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Course</button>
                                </form>
                            </td>
                        </tr>
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
