@section('title', 'Course Management')
@extends('Admin.layots.main')
@section('main-container')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Courses | @yield('title')</title>
    <link rel="stylesheet" href="{{asset('Admin/css/chefs.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/css/foodecart.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <section class="admin-panel">
        <h2>Add Courses</h2>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color:#ff4f00">
            <strong>Success!</strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <form class="admin-form" action="{{route('course.create')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="course-name">Course Name:</label>
            <input type="text" id="course-name" placeholder="Enter Course Name" name="course_name" required>
            @if ($errors->has('course_name'))
            <span class="text-danger">{{ $errors->first('course_name') }}</span>
            @endif

            <label for="course-description">Course Description:</label>
            <textarea id="course-description" placeholder="Enter Course Description" name="course_description" required></textarea>
            @if ($errors->has('course_description'))
            <span class="text-danger">{{ $errors->first('course_description') }}</span>
            @endif

            <label for="course-syllabus">Course Syllabus:</label>
            <textarea id="course-syllabus" placeholder="Enter Course Syllabus" name="course_syllabus" required></textarea>
            @if ($errors->has('course_syllabus'))
            <span class="text-danger">{{ $errors->first('course_syllabus') }}</span>
            @endif

            <label for="assign-instructor">Assign Instructor:</label>

            <select id="assign-instructor" name="instructor_id" required>
                <option value="">Select Instructor</option>
                <!-- Dynamically fetch instructors here -->
                @foreach ($instructor as $ins )
                <option value="{{$ins->id ?? ""}}">{{$ins->name ?? ""}}</option>
                @endforeach

                <!-- Add more options as per the instructor data -->
            </select>

            @if ($errors->has('instructor_id'))
            <span class="text-danger">{{ $errors->first('instructor_id') }}</span>
            @endif
            <br>
            <br>
            <input type="file" name="course_pic"/>
            <button type="submit" name="BtnSubmit">Submit</button>
        </form>

        <!-- Manage Courses Button -->
        <section class="manage-courses-button">
            <a href="{{route('courses.manage')}}" class="btn">Manage Courses</a>
        </section>
    </section>
</body>

<style>
    .admin-panel {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .admin-form {
        width: 100%;
        max-width: 400px;
        margin-bottom: 20px;
    }
    .manage-courses-button {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
    .manage-courses-button .btn {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 16px;
        text-decoration: none;
    }
    .manage-courses-button .btn:hover {
        background-color: #0056b3;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-cjMd6EtUpRVnJoHyX+51ptbV65+5tX+NF9I3zqW3A0u6v/u0apZ/6p6H5L7KwMgB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+c6MAdNpH1flVWTpLk+bPQ7KgV8rW34ZZfYjZG3PAgR2Xp+qq0N6GnHD7o4eGa" crossorigin="anonymous"></script>

</html>
@endsection
