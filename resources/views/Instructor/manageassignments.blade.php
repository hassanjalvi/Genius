@extends('Admin.layots.main')

@section('title', 'Manage Assignments')

@section('main-container')
<link rel="stylesheet" href="{{ asset('Admin/css/management.css') }}">

<main>
    <section id="manage-assignments" style="margin-left: 100px">
        <div class="container">
            <h2>Manage Assignments</h2>
           <a href="{{route('mycourses.assignment.add')}}"> <button class="btn btn-success"  >Add New Assignment</button></a>
            <br><br>

            <div class="assignments-list">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Assignment File</th>
                            <th>Assignment Title</th>
                            <th>Course</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- Assignment Row 1 -->
                        @foreach ($coursesAssigment as $cou )


                        <tr>
                            <td>{{$cou->id}}</td>
                            <td>
                                <a href="{{ asset('storage/assignments/assignment1.pdf') }}" target="_blank">View Assignment</a>
                            </td>
                            <td>{{$cou->assigment->assignment_title ?? ""}}</td>
                            <td>Course1</td>
                            <td>
                                <button class="btn btn-primary" onclick="toggleEditForm(1)">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="#" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this assignment?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <tr id="edit-form-1" style="display: none;">
                            <td colspan="5">
                                <form action="#" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Assignment Title</label>
                                        <input type="text" class="form-control" name="title" value="Intro to Laravel Assignment" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Assignment File (optional)</label>
                                        <input type="file" class="form-control" name="assignment_file">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Course</label>
                                        <select class="form-control" name="course_id" required>
                                            <option value="1" selected>Course1</option>
                                            <option value="2">Course2</option>
                                            <option value="3">Course3</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Assignment</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                        <!-- Assignment Row 2 -->


                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>

<script>
    function toggleEditForm(assignmentId) {
        var editForm = document.getElementById('edit-form-' + assignmentId);
        editForm.style.display = (editForm.style.display === 'none' || editForm.style.display === '') ? 'table-row' : 'none';
    }

    function toggleAddForm() {
        // Placeholder function - implement when "Add Form" is available
        alert('Add Form toggle is not implemented yet.');
    }
</script>
@endsection
