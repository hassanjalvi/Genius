@section('title', 'Admin')
@extends('Admin.layots.main')
@section('main-container')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Instructors | @yield('title')</title>
    <link rel="stylesheet" href="{{asset('Admin/css/chefs.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/css/foodecart.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <section class="admin-panel">
        <h2>Add Instructors</h2>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color:#ff4f00">
            <strong>Success!</strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <form class="admin-form" action="{{route('instructor.create')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" placeholder="Enter Instructor Name" name="name" required>
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif

            <label for="email">Email:</label>
            <input type="text" id="email" placeholder="Enter Email" name="email" required>
            @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif

            <label for="password">Password:</label>
            <input type="text" id="password" placeholder="Enter Password" name="password" required>
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif

            <label for="expertise">Expertise:</label>
            <input type="text" id="expertise" placeholder="Enter Expertise" name="expertise" required>
            @if ($errors->has('expertise'))
            <span class="text-danger">{{ $errors->first('expertise') }}</span>
            @endif

            <!-- Instructor Image Upload -->
            <label for="image">Instructor Image:</label>
            <input type="file" id="image" name="instructor_file" accept="image/*">
            @if ($errors->has('image'))
            <span class="text-danger">{{ $errors->first('image') }}</span>
            @endif

            <br><br>


            <div class="mb-5">
                <label for="image">Feature Instructor</label>

            <select id="assign-instructor" name="feature" required>
                <!-- Dynamically fetch instructors here -->

                <option value="0" selected>no</option>
                <option value="1">yes</option>


                <!-- Add more options as per the instructor data -->
            </select>

        </div>

            <button type="submit" name="BtnSubmit">Submit</button>
        </form>

        <!-- Manage Instructors Button -->
        <section class="manage-instructors-button">
            <a href="{{route('instructors.manage')}}" class="btn">Manage Instructors</a>
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
        background-color: #007bff;
    }
</style>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-cjMd6EtUpRVnJoHyX+51ptbV65+5tX+NF9I3zqW3A0u6v/u0apZ/6p6H5L7KwMgB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+c6MAdNpH1flVWTpLk+bPQ7KgV8rW34ZZfYjZG3PAgR2Xp+qq0N6GnHD7o4eGa" crossorigin="anonymous"></script>

</html>
@endsection
