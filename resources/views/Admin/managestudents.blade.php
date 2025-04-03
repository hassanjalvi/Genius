@extends('Admin.layots.main')

@section('title', 'Manage Students')

@section('main-container')
<link rel="stylesheet" href="{{asset('Admin/css/management.css')}}">
<main>
    <section id="manage-students" style="margin-left: 100px">
        <div class="container">
            <h2>Manage Students</h2>

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
                        <label class="form-label">Status:</label>
                        <select class="form-control">
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>

            <div class="students-list">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($students as $stu)
                        <tr>
                            <td>{{$stu->name ?? ""}}</td>
                            <td>{{$stu->email ?? ""}}</td>
                            <td style='cursor: pointer;'>{{$stu->status ==1 ? 'Active' : 'Inactive'}}</td>
                            <td>
                                <button onclick="toggleEditForm({{ $stu->id }})" class="btn btn-primary edit-btn" ><i class="fas fa-edit"></i></button>

                                <div style="display: inline-block;">
                                <form action="{{ route('student.delete', $stu->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                <button class="btn btn-warning"><i class="fas fa-user-slash"></i></button>
                                </form>
                            </div>

                            </td>
                        </tr>
                        {{-- @endforeach --}}


                        <tr id="edit-form-{{ $stu->id }}" class="edit-form" style="display: none;">
                            <td colspan="4">
                                <form action="{{ route('student.update', $stu->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label class="form-label">Name:</label>
                                        <input type="text" class="form-control" name="name" value="{{ $stu->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email:</label>
                                        <input type="email" class="form-control" name="email" value="{{ $stu->email }}"  required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Status:</label>
                                        <select name="status" class="form-control">
                                            <option value="1" {{ $stu->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $stu->status == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
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
