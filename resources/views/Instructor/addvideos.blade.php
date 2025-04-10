@section('title', 'Instructor')
@extends('Instructor.layots.main')
@section('main-container')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add  Course Videos | @yield('title')</title>
    <link rel="stylesheet" href="{{asset('Admin/css/chefs.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/css/foodecart.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <section class="admin-panel">
        

        <!-- Add Course Video Section -->
        <h2>Add Course Video</h2>

        <form class="admin-form" action="" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="course_id">Select Course:</label>
            <select name="course_id" id="course_id" class="form-control" required>
                <option value="">-- Select Course --</option>
                <option value="course1">course1</option>
            </select>
            @error('course_id') <span class="text-danger">{{ $message }}</span> @enderror

            <label for="video_title">Video Title:</label>
            <input type="text" id="video_title" name="video_title" placeholder="Enter Video Title" required>
            @error('video_title') <span class="text-danger">{{ $message }}</span> @enderror

            <label for="video_file">Upload Video File:</label>
            <input type="file" id="video_file" name="video_file" accept="video/*" required>
            @error('video_file') <span class="text-danger">{{ $message }}</span> @enderror

            <br><br>
            <button type="submit">Upload Video</button>
        </form>
        <section class="manage-instructors-button">
            <a href="{{route('mycourses.videos.manage')}}" class="btn">Manage Videos</a>
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
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 16px;
        text-decoration: none;
    }

    .manage-instructors-button .btn:hover {
        background-color: #0056b3;
    }
</style>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</html>
@endsection
