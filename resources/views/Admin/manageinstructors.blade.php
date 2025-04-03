@extends('Admin.layots.main')

@section('title', 'Manage Instructors')

@section('main-container')
<link rel="stylesheet" href="{{asset('Admin/css/management.css')}}">
<main>
    <section id="manage-instructors" style="margin-left: 100px">
        <div class="container">
            <h2>Manage Instructors</h2>
            <button class="btn btn-success" href="{{route('instructors.add')}}">Add New Instructors</button>
            <br>
            <br>
            <div id="add-form" class="edit-form" style="display: none;">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password:</label>
                        <input type="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Expertise:</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status:</label>
                        <select class="form-control">
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Instructor</button>
                </form>
            </div>

            <div class="instructors-list">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Expertise</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Jane Smith</td>
                            <td>jane@example.com</td>
                            <td>Web Development</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-primary edit-btn" onclick="toggleEditForm(1)"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-warning"><i class="fas fa-user-slash"></i></button>
                            </td>
                        </tr>
                        <tr id="edit-form-1" class="edit-form" style="display: none;">
                            <td colspan="5">
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Name:</label>
                                        <input type="text" class="form-control" value="Jane Smith" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email:</label>
                                        <input type="email" class="form-control" value="jane@example.com" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Expertise:</label>
                                        <input type="text" class="form-control" value="Web Development" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Status:</label>
                                        <select class="form-control">
                                            <option selected>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
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
    function toggleEditForm(instructorId) {
        var editForm = document.getElementById('edit-form-' + instructorId);
        editForm.style.display = (editForm.style.display === 'none' || editForm.style.display === '') ? 'table-row' : 'none';
    }
    
    function toggleAddForm() {
        var addForm = document.getElementById('add-form');
        addForm.style.display = (addForm.style.display === 'none' || addForm.style.display === '') ? 'block' : 'none';
    }
</script>

@endsection
