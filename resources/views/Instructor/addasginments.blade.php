@section('title', 'Instructor')
@extends('Instructor.layots.main')
@section('main-container')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course Assignment | @yield('title')</title>
    <link rel="stylesheet" href="{{asset('Admin/css/chefs.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/css/foodecart.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <section class="admin-panel">

        <!-- Add Assignment Section -->
        <h2>Add Course Assignment</h2>

        <form class="admin-form" action="{{ route('mycourses.assignment.create') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="course_id">Select Course:</label>
            <select name="course_id" id="course_id" class="form-control" required>
                @foreach ($courses as $cour)
                <option value="{{ $cour->id }}">{{ $cour->name }}</option>
                @endforeach
            </select>
            @error('course_id') <span class="text-danger">{{ $message }}</span> @enderror

            <label for="assignment_number">Assignment Number:</label>
            <input type="number" id="assignment_number" name="assignment_number" class="form-control" placeholder="Enter Assignment Number" required min="1">
            @error('assignment_number') <span class="text-danger">{{ $message }}</span> @enderror

            <label for="assignment_title">Assignment Title:</label>
            <input type="text" id="assignment_title" name="assignment_title" class="form-control" placeholder="Enter Assignment Title" required>
            @error('assignment_title') <span class="text-danger">{{ $message }}</span> @enderror

            <label for="assignment_description">Assignment Description:</label>
            <textarea id="assignment_description" name="assignment_description" class="form-control" rows="4" placeholder="Enter Description" required></textarea>
            @error('assignment_description') <span class="text-danger">{{ $message }}</span> @enderror

            <label for="assignment_file">Upload Assignment File (PDF, DOCX):</label>
            <input type="file" id="assignment_file" name="assignment_file" class="form-control" accept=".pdf,.doc,.docx" required>
            @error('assignment_file') <span class="text-danger">{{ $message }}</span> @enderror

            <br><br>
            <button type="submit" class="btn btn-primary">Upload Assignment</button>
        </form>

        <section class="manage-instructors-button">
            <a href="{{route('mycourses.assignment.manage')}}" class="btn">Manage Assignments</a>
        </section>

    </section>
</body>

<style>
    .admin-panel {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 40px 20px;
    }

    .admin-form {
        width: 100%;
        max-width: 500px;
        margin-bottom: 30px;
    }

    .manage-instructors-button {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .manage-instructors-button .btn {
        background-color: #0056b3;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 16px;
        text-decoration: none;
    }

    .manage-instructors-button .btn:hover {
        background-color: #004080;
    }
</style>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</html>
@endsection
