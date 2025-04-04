@extends('Admin.layots.main')

@section('title', 'Manage Instructors')

@section('main-container')
<link rel="stylesheet" href="{{asset('Admin/css/management.css')}}">
<main>
    <section id="manage-instructors" style="margin-left: 100px">
        <div class="container">
            <h2>Manage Instructors</h2>
          <a href="{{route('instructors.add')}}">  <button class="btn btn-success" >Add New Instructors</button></a>
            <br>
            <br>
            
            <div class="instructors-list">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Expertise</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($instructor as $ins )
                        <tr>
                            <td>{{$ins->id ?? ""}}</td>
                            <td>{{$ins->name ?? ""}}</td>
                            <td>{{$ins->email ?? ""}}</td>
                            <td>{{$ins->instructor->expertise ?? ""}}</td>
                            <td>{{$ins->status == 1 ? 'Active' : 'Inactive'}}</td>
                            <td>
                                <button onclick="toggleEditForm({{ $ins->id }})" class="btn btn-primary edit-btn" ><i class="fas fa-edit"></i></button>
                                <div style="display: inline-block;">

                                <form action="{{ route('instructor.delete', $ins->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this instructor?');">
                                    @csrf
                                    @method('DELETE')
                                <button class="btn btn-warning"><i class="fas fa-user-slash"></i></button>
                            </form>
                        </div>

                            </td>
                        </tr>



                        <tr id="edit-form-{{ $ins->id }}" class="edit-form" style="display: none;">
                            <td colspan="5">
                                <form action="{{ route('instructor.update', $ins->id) }}" method="POST">\
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label class="form-label">Name:</label>
                                        <input type="text" class="form-control" name="name" value="{{ $ins->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email:</label>
                                        <input type="email" class="form-control" name="email" value="{{ $ins->email }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Expertise:</label>
                                        <input type="text" class="form-control" name="expertise" value="{{ $ins->expertise }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Status:</label>
                                        <select name="status" class="form-control">
                                            <option value="1" {{ $ins->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $ins->status == 0 ? 'selected' : '' }}>Inactive</option>
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
