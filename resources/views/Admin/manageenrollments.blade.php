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
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>john@example.com</td>
                            <td>
                                <ul>
                                    <li>Course 1</li>
                                    <li>Course 2</li>
                                </ul>
                            </td>
                            <td>
                                <button class="btn btn-primary edit-btn" onclick="toggleEditForm(1)"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-warning"><i class="fas fa-user-slash"></i></button>
                            </td>
                        </tr>
                        <tr id="edit-form-1" class="edit-form" style="display: none;">
                            <td colspan="4">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Student Name:</label>
                                        <input type="text" class="form-control" value="John Doe" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email:</label>
                                        <input type="email" class="form-control" value="john@example.com" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Enrolled Courses:</label>
                                        <select class="form-control" multiple>
                                            <option selected>Course 1</option>
                                            <option>Course 2</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Enrollment</button>
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
