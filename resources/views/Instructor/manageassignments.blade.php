@extends('Instructor.layots.main')

@section('title', 'Manage Assignments')

@section('main-container')
<link rel="stylesheet" href="{{ asset('Admin/css/management.css') }}">

<main>
    <section id="manage-assignments" style="margin-left: 100px">
        <div class="container">
            <h2>Manage Assignments</h2>
            @if(session('success'))
    <div id="toast-success" class="toast-message">
        {{ session('success') }}
    </div>

    <style>
    .toast-message {
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: #4CAF50;
        color: white;
        padding: 15px 25px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
        z-index: 9999;
        font-weight: bold;
        animation: fadeout 1s ease-in-out 9s forwards;
    }

    @keyframes fadeout {
        to { opacity: 0; transform: translateY(-20px); visibility: hidden; }
    }
    </style>

    <script>
        setTimeout(function() {
            let toast = document.getElementById('toast-success');
            if (toast) {
                toast.remove();
            }
        }, 10000); // 10 seconds
    </script>
@endif


           <button class="btn btn-success" onclick="window.location='{{ route('mycourses.assignment.add') }}'">Add New Assignment</button>
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
                        {{-- @foreach ($coursesAssigment as $cou ) --}}


                        @foreach($coursesAssigment as $course)
    @foreach($course->assignment as $assignment)
                        <tr>
                            <td>{{$assignment->id ?? ""}}</td>
                            <td>
                                <a href="{{$assignment->assigment_file ?? ""}}" target="_blank">View Assignment</a>
                                {{-- <a href="{{ asset('assignment_files/' . basename($assignment->assigment_file)) }}" target="_blank">View Assignment</a> --}}
                            </td>
                            {{-- <td>{{$cou->assigment->assignment_title ?? ""}}</td> --}}
                            <td>{{$assignment->assignment_title ?? ""}}</td>
                            <td>{{$course->name ?? ""}}</td>

                            <td>
                                <button class="btn btn-primary" onclick="toggleEditForm({{ $assignment->id }})">
                                    <i class="fas fa-edit"></i>
                                </button>


                                <div style="display: inline-block;">

                                    <form action="{{ route('assignment.delete', $assignment->id) }}"  method="POST" onsubmit="return confirm('Are you sure you want to delete this assignment?');">
                                        @csrf
                                        @method('DELETE')
                                <button class="btn btn-danger delete-btn" ><i class="fas fa-trash"></i></button>
                                    </form>
                            </div>
                            </td>
                        </tr>
                        <tr id="edit-form-{{ $assignment->id }}" style="display: none;">
                            <td colspan="5">
                                <form action="{{ route('assignment.update', $assignment->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Assignment Title</label>
                                        <input type="text" class="form-control" name="assignment_title" value="{{ $assignment->assignment_title }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Assignment File (optional)</label>
                                        <input type="file" class="form-control" name="assignment_file">
                                    </div>
                                    {{-- <div class="mb-3">
                                        <label class="form-label">Course</label>
                                        <select class="form-control" name="course_id" required>
                                            <option value="1" selected>Course1</option>
                                            <option value="2">Course2</option>
                                            <option value="3">Course3</option>
                                        </select>
                                    </div> --}}
                                    <button type="submit" class="btn btn-primary">Update Assignment</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endforeach
                        {{-- @endforeach --}}

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
