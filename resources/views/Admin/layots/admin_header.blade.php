<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{asset('Admin/css/adminheader.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
</head>
<body>

<div class="open-btn" onclick="toggleSidebar()">☰</div>

<div class="sidebar open" id="sidebar">
    <div class="sidebar-heading">Admin Panel</div>
    <a href="{{ route('admin.dashboard') }}" class="active">Dashboard</a>
    <a href="{{ route('students.manage') }}">Students</a>
    <a href="{{ route('instructors.manage') }}">Instructors</a>
    <a href="{{ route('courses.manage') }}">Courses</a>
    <a href="{{ route('enrolments.manage') }}">Enrollments</a>
    <a href="{{ route('payments.manage') }}">Payments</a>
    <a href="{{ route('setup.fees') }}">Setup Fee</a>



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
@endif

</div>

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
<script>
    window.addEventListener("pageshow", function (event) {
        if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
            window.location.reload();
        }
    });
</script>

</body>
</html>
