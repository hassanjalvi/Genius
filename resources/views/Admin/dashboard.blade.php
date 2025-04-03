@section('title', 'Dashboard')
@extends('Admin.layots.main')

@section('main-container')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Admin</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('Admin/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/css/dashbord.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/css/foodecart.css')}}">
    
</head>
<body>
<center style="margin-left: 250px;">
    <div class="container">
        <h2 class="text-center mt-3">Admin Dashboard</h2>
        <hr>
    
        <div class="row">
            <!-- Manage Students -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Students</h5>
                        <p class="card-text">View, add, or edit student records.</p>
                        <a href="{{ route('students.manage') }}" class="btn btn-primary">Manage Students</a>
                    </div>
                </div>
            </div>
    
            <!-- Manage Instructors -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Instructors</h5>
                        <p class="card-text">Manage instructors and assign courses.</p>
                        <a href="{{ route('instructors.manage') }}" class="btn btn-primary">View Instructors</a>
                    </div>
                </div>
            </div>
    
            <!-- Manage Courses -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Courses</h5>
                        <p class="card-text">Create, edit, and manage courses.</p>
                        <a href="{{ route('courses.manage') }}" class="btn btn-primary">Manage Courses</a>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="row">
            <!-- Enrollments -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Enrollments</h5>
                        <p class="card-text">Manage student enrollments.</p>
                        <a href="{{ route('enrolments.manage') }}" class="btn btn-primary">View Enrollments</a>
                    </div>
                </div>
            </div>
    
            <!-- Payments -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Payments</h5>
                        <p class="card-text">Monitor student payments and subscriptions.</p>
                        <a href="{{ route('payments.manage') }}" class="btn btn-primary">View Payments</a>
                    </div>
                </div>
            </div>
    
            <!-- Setup Fee -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Setup Fee</h5>
                        <p class="card-text">Configure initial setup fees.</p>
                        <a href="{{ route('setup.fees') }}" class="btn btn-primary">Manage Setup Fee</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</center>
<footer class="footer py-4" style="margin-left: 100px">
    <div class="container-fluid">
        <div class="d-block mx-auto">
            <p class="mb-0"> <b>Genius.</b>, made by  <a href="https://code-trail-innovations.vercel.app/" target="_blank">CodeTrail Innovations</a>.</p>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
@endsection
