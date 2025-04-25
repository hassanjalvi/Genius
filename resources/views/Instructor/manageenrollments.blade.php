@extends('Instructor.layots.main')

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
                            <th>Course</th>
                            <th>Grade</th>
                            <th>View Progress</th>

                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($enroll as $en)
                        @foreach ( $en->enrollment as $stu )




                        <tr>
                            <td>{{$stu->id ?? ""}}</td>
                            <td>{{$stu->user->name ?? ""}}</td>
                            <td>{{$stu->user->email ?? ""}}</td>
                            <td>{{$en->name ?? ""}}</td>
                            <td>
                                {{ $stu->random_grade ?? '' }}
                            </td>

                            <td><a href="{{ route('student.progress',$stu->user->id) }}"> View Progress</a></td>


{{--
                            <td>
                                <button class="btn btn-primary edit-btn" onclick="toggleEditForm(1)"><i class="fas fa-edit"></i></button>
                                <div style="display: inline-block;">
                                    <form onsubmit="return confirm('Are you sure you want to delete this instructor?');">
                                        <button class="btn btn-warning"><i class="fas fa-user-slash"></i></button>
                                    </form>
                                </div>
                            </td> --}}
                        </tr>


                        <tr id="edit-form-1" class="edit-form" style="display: none;">
                            <td colspan="4">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Student Name:</label>
                                        <input type="text" class="form-control" name="user_name" value="John Doe" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email:</label>
                                        <input type="email" class="form-control" name="user_email" value="john@example.com" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Enrollment</button>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                        @endforeach
                        <!-- Add more static entries below if needed -->
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
