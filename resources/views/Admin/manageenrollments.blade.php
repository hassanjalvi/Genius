@extends('Admin.layots.main')

@section('title', 'Manage Enrollments')

@section('main-container')
<link rel="stylesheet" href="{{asset('Admin/css/management.css')}}">
<main>
    <section id="manage-enrollments" style="margin-left: 100px">
        <div class="container">
            <h2>Manage Enrollments</h2>
            <!-- Enrollments List -->
            <div class="enrollments-list">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student Name</th>
                            <th>Email</th>
                            <th>Enrolled Courses</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($enrollmnet as $enroll )


                        <tr>
                            <td>{{$enroll->user->id ?? ""}}</td>
                            <td>{{$enroll->user->name ?? ""}}</td>
                            <td>{{$enroll->user->email ?? ""}}</td>
                            <td>{{$enroll->course->name ?? ""}}</td>

                            {{-- <td>
                                <ul>
                                    <li>Course 1</li>
                                    <li>Course 2</li>
                                </ul>
                            </td> --}}
                            <td>
                                {{-- <button class="btn btn-primary edit-btn" onclick="toggleEditForm({{ $enroll->id }})"><i class="fas fa-edit"></i></button> --}}

                                <div style="display: inline-block;">

                                    <form action="{{ route('enrollment.delete', $enroll->id) }}"  method="POST" onsubmit="return confirm('Are you sure you want to delete this coutructor?');">
                                        @csrf
                                        @method('DELETE')
                                <button class="btn btn-warning"><i class="fas fa-user-slash"></i></button>
                            </form>
                        </div>
                            </td>
                        </tr>



                        <tr id="edit-form-{{ $enroll->id }}" class="edit-form" style="display: none;">
                            <td colspan="4">
                                <form action="{{ route('enrollment.update', $enroll->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label class="form-label">Student Name:</label>
                                        <input type="text" class="form-control" name="user_name" value="{{$enroll->user->name ?? ""}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email:</label>
                                        <input type="email" class="form-control" name="user_email" value="{{$enroll->user->email ?? ""}}" required>
                                    </div>
                                    {{-- <div class="mb-3">
                                        <label class="form-label">Enrolled Courses:</label>
                                        <select class="form-control" multiple>
                                            <option selected>Course 1</option>
                                            <option>Course 2</option>
                                        </select>
                                    </div> --}}
                                    <div class="mb-3">
                                        <label class="form-label">Enrolled Courses</label>
                                        <input type="text" class="form-control" name="courses" value="{{$enroll->course->id ?? ""}}" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Enrollment</button>
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
    function toggleEditForm(studentId) {
        var editForm = document.getElementById('edit-form-' + studentId);
        editForm.style.display = (editForm.style.display === 'none' || editForm.style.display === '') ? 'table-row' : 'none';
    }

    function toggleAddForm() {
        var addForm = document.getElementById('add-form');
        addForm.style.display = (addForm.style.display === 'none' || addForm.style.display === '') ? 'block' : 'none';
    }
</script>

@endsection
