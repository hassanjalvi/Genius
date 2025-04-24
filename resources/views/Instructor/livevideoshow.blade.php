@section('title', 'Live Classes')
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .main-content {
            margin-left: 250px; /* Adjust based on your sidebar width */
            padding: 20px;
        }
        .live-class-table {
            margin-top: 30px;
        }
        .table-responsive {
            overflow-x: auto;
        }
        .table th {
            background-color: #343a40;
            color: white;
        }
        .zoom-link {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            display: inline-block;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .table-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            padding: 20px;
        }
    </style>
</head>
<body>

<!-- Sidebar content here (from your layout) -->

<div class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="table-container">
                    <h2 class="mb-4">Live Classes Schedule</h2>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="table-responsive live-class-table">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Course Name</th>
                                    <th>Description</th>
                                    <th>Meeting Time</th>
                                    <th>Zoom Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($course_live_video as $index => $course)
                                    @foreach($course->liveClass as $liveClass)
                                    <tr>
                                        <td>{{ $index + 1  ?? ""}}</td>
                                        <td>{{ $course->name  ?? ""}}</td>
                                        <td>{{ Str::limit($course->description, 50) ?? ""}}</td>
                                        <td>{{ \Carbon\Carbon::parse($liveClass->meeting_time ?? "")->format('M d, Y h:i A') }}</td>
                                        <td>
                                            <a href="{{ $liveClass->zoom_link ?? "" }}" class="zoom-link" target="_blank">
                                                {{ $liveClass->zoom_link ?? "" }}
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('delete.class.live', $liveClass->id ?? "") }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this live class?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No live classes scheduled yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Auto-refresh the page every 60 seconds to check for new classes
    setTimeout(function(){
        window.location.reload();
    }, 60000);
</script>

</body>
</html>
@endsection
