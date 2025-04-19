@section('title', 'Dashboard')
@extends('Student.layots.main')

@section('main-container')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Instructor</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('../Admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('../Admin/css/dashbord.css') }}">
</head>
<body>
<center style="margin-left: 250px;">
    <div class="container">
        <h2 class="text-center mt-4">Instructor Dashboard Overview</h2>
        <hr>

        <!-- 🔧 Quick Stats Section -->
        <div class="row mt-5">
            <div class="col-md-6">
                <a href="{{ route('student.mycourses') }}" style="text-decoration: none;">
                    <div class="card text-white bg-primary mb-3 text-center">
                        <div class="card-body">
                            <h5 class="card-title" style="color: white">Total Courses</h5>
                            <h3>0</h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="" style="text-decoration: none;">
                    <div class="card text-white bg-warning mb-3 text-center">
                        <div class="card-body">
                            <h5 class="card-title" style="color: white">Communication Center</h5>
                            <h3>0</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
</center>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
@endsection
