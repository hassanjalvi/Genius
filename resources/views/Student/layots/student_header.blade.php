<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="{{asset('../Admin/css/adminheader.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<div class="open-btn" onclick="toggleSidebar()">☰</div>
<div class="sidebar open" id="sidebar">
    <div class="sidebar-heading">Student Dashboard</div>
    <a href="{{ route('student.dashboard') }}" class="active">Dashboard</a>
    <a href="{{ route('student.mycourses') }}">My Courses</a>
    {{-- <a href="{{ route('student.progress') }}">My Progress</a> --}}
    {{-- <a href="{{ route('student.mycourses.videos') }}">Course Videos</a>
    <a href="{{ route('student.mycourses.assignments') }}">Course Assignments</a>
    <a href="{{ route('student.mycourses.quizes') }}">Course Quizes</a> --}}
    @if(Auth::check())
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <a href="#" class="logout-btn"
       onclick="event.preventDefault(); if(confirm('Are you sure you want to logout?')) document.getElementById('logout-form').submit();">
        Logout
    </a>
@else
    <a href="{{ route('login') }}" class="login-btn">Login</a>
@endif</div>

<div class="main open" id="main">
    <!-- Content of your main section goes here -->
    <!-- You can keep your existing content here -->
</div>

<script>
    function toggleSidebar() {
        var sidebar = $('#sidebar');
        var main = $('#main');
        if (sidebar.hasClass('open')) {
            sidebar.removeClass('open');
            main.removeClass('open');
        } else {
            sidebar.addClass('open');
            main.addClass('open');
        }
    }

    $(document).ready(function() {
        $('#sidebar').css({
            'position': 'fixed',
            'top': '0',
            'left': sidebar.hasClass('open') ? '0' : '-250px', // Set the initial state based on the presence of the 'open' class
            'height': '100%',
            'width': '250px',
            'background-color': '#333',
            'overflow-x': 'hidden',
            'padding-top': '20px',
            'transition': 'left 0.3s ease'
        });

        $('#main').css({
            'transition': 'margin-left 0.3s ease',
            'margin-left': sidebar.hasClass('open') ? '250px' : '0' // Set the initial state based on the presence of the 'open' class
        });
    });
</script>

</body>
</html>
