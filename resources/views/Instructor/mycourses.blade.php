@section('title', 'Dashboard')
@extends('Instructor.layots.main')

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
            <h2 class="text-center mt-4">My Courses</h2>
            <hr>

            <!-- 🔧 Quick Stats Section -->
            <div class="row mt-5">


                @foreach ($courses as $cour)


                <div class="col-md-4">
                    <a href="{{ route('instructor.mycourses.content',$cour->id) }}" style="text-decoration: none;">
                        <div class="card text-white bg-primary mb-3 text-center">
                            <div class="card-body">
                                <br>
                                <h3>{{ $cour->name ?? "" }}</h3>
                            </div>
                        </div>
                    </a>
                </div>

                @endforeach

                {{-- <div class="col-md-4">
                    <a href="{{ route('instructor.mycourses.content') }}" style="text-decoration: none;">
                        <div class="card text-white bg-success mb-3 text-center">
                            <div class="card-body">
                                <br>
                                <h3>Math</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="{{ route('instructor.mycourses.content') }}" style="text-decoration: none;">
                        <div class="card text-white bg-warning mb-3 text-center">
                            <div class="card-body">
                                <br>
                                <h3>Science</h3>
                            </div>
                        </div>
                    </a>
                </div> --}}

            </div>
        </div>
    </center>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
@endsection