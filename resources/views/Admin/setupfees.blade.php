@section('title', 'Admin')
@extends('Admin.layots.main')
@section('main-container')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Up Fees | @yield('title')</title>
    <link rel="stylesheet" href="{{asset('Admin/css/chefs.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/css/foodecart.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<body>
    <section class="admin-panel">
        <h2>Set Up Course Fees</h2>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <form class="admin-form" action="{{route('setup.fees.create')}}" method="post">
            @csrf
            <label for="course_id">Select Course:</label>
            <select id="course_id" name="course_id"  style="width: 100%; padding: 10px; font-size: 16px;">

                <option value="">Select a Course</option>
                @foreach ($courses as $cou)
                <option value="{{$cou->id}}">{{$cou->name ?? ""}}</option>
                @endforeach
            </select>
            @if ($errors->has('course_id'))
                <span class="text-danger">{{ $errors->first('course_id') }}</span>
            @endif

            <label for="price">Course Duration (USD):</label>
            <input type="text" id="price" placeholder="Enter Course Duration" name="course_duration" required
                   style="width: 100%; padding: 10px; font-size: 16px;">
            @if ($errors->has('price'))
                <span class="text-danger">{{ $errors->first('price') }}</span>
            @endif

            <label for="price">Price (USD):</label>
            <input type="number" id="price" placeholder="Enter Course Price" name="price" required
                   style="width: 100%; padding: 10px; font-size: 16px;">
            @if ($errors->has('price'))
                <span class="text-danger">{{ $errors->first('price') }}</span>
            @endif

            <label for="discount">Discount (%):</label>
            <input type="number" id="discount" placeholder="Enter Discount Percentage" name="discount" min="0" max="100"
                   style="width: 100%; padding: 10px; font-size: 16px;">

            <label for="payment_plan">Payment Plan:</label>
            <select id="payment_plan" name="payment_plan" required style="width: 100%; padding: 10px; font-size: 16px;">
                <option value="one-time">One-Time Payment</option>
                <option value="monthly">Monthly Installments</option>
                <option value="quarterly">Quarterly Installments</option>
            </select>
            <br>
            <br>
            <button type="submit" name="BtnSubmit"
                    style="width: 100%; padding: 12px; font-size: 18px; background-color: #007bff; color: white; border: none; cursor: pointer;">
                Submit
            </button>
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</html>
@endsection
