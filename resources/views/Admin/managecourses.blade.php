@extends('Admin.layots.main')

@section('title', 'Manage Courses')

@section('main-container')
<link rel="stylesheet" href="{{asset('Admin/css/management.css')}}">
<style>
    #manage-courses .container {
    max-width: 80%;
    overflow-x: auto;
}

#manage-courses table {
    min-width: 800px; /* Or more, based on content */
    width: 100%;
}
</style>
<main>
    <section id="manage-courses" style="margin-left: 200px ;" >
        @if(session('success'))
        <div id="toast-success" class="toast-message">
            {{ session('success') }}
        </div>

        <style>
        .toast-message {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 15px 25px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
            z-index: 9999;
            font-weight: bold;
            animation: fadeout 1s ease-in-out 9s forwards;
        }

        @keyframes fadeout {
            to { opacity: 0; transform: translateY(-20px); visibility: hidden; }
        }
        </style>

        <script>
            setTimeout(function() {
                let toast = document.getElementById('toast-success');
                if (toast) {
                    toast.remove();
                }
            }, 10000); // 10 seconds
        </script>
    @endif
        <div class="container" style="">
            <h2>Manage Courses</h2>
          <a href="{{route('courses.add')}}">  <button class="btn btn-success"  >Add New Course</button></a>
            <br>
            <br>

            <div class="courses-list">
                <table class="table table-striped" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Course Name</th>
                            <th>Description</th>
                            <th>Syllabus</th>
                            <th>Instructor</th>
                            <th>Course Duration</th>
                            <th>Course Fee</th>
                            <th>Course Discout</th>
                            <th>Paymnet Plan</th>
                            <th>Status</th>
                            <th style="width: 500px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example course entry; Dynamically populate this table from the database -->
                        @foreach ($course as $cou )


                        <tr>
                            <td>{{$cou->id ?? ""}}</td>
                            <td>{{$cou->name ?? ""}}</td>
                            <td>{{$cou->description ?? ""}}</td>
                            <td>{{$cou->syllabus ?? ""}}</td>
                            <td>{{$cou->instructor->name ?? ""}}</td>
                            <td>{{$cou->courseFee->course_duration ?? "---"}}</td>
                            <td>{{$cou->courseFee->price ?? "---"}}</td>
                            <td>{{$cou->courseFee->discount ?? "---"}}</td>
                            <td>{{$cou->courseFee->payment_plan ?? "---"}}</td>




                            <td>{{$cou->status ===1 ? "Active" : "Inactive"}}</td>
                            <td>
                                <button onclick="toggleEditForm({{ $cou->id }})" class="btn btn-primary edit-btn" ><i class="fas fa-edit"></i></button>

                                <div style="display: inline-block;">

                                    <form action="{{ route('course.delete', $cou->id) }}"  method="POST" onsubmit="return confirm('Are you sure you want to delete this coutructor?');">
                                        @csrf
                                        @method('DELETE')
                                <button class="btn btn-danger delete-btn" ><i class="fas fa-trash"></i></button>
                                    </form>
                            </div>

                            </td>
                        </tr>

                        <tr id="edit-form-{{ $cou->id }}" class="edit-form" style="display: none;">
                            <td colspan="6">
                                <form action="{{ route('course.update', $cou->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="course_id" value="1">
                                    <div class="mb-3">
                                        <label class="form-label">Course Name:</label>
                                        <input type="text" class="form-control" name="course_name" value="{{ $cou->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Course Description:</label>
                                        <textarea class="form-control" name="course_description" value="{{ $cou->name }}" required>{{ $cou->description ?? "" }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Course Syllabus:</label>
                                        <textarea class="form-control" name="course_syllabus" value="{{ $cou->syllabus }}" required>{{ $cou->syllabus ?? "" }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Assign coutructor:</label>
                                        <select class="form-control" name="coutructor_id" required>
                                            <option value="1" selected>{{ $cou->instructor->name ?? "" }}</option>

                                            @foreach ($instructor as $ins)


                                            <option value="{{ $ins->id  }}">{{ $ins->name ?? "" }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Status:</label>
                                        <select name="status" class="form-control">
                                            <option value="1" {{ $cou->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $cou->status == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>



                                    <div class="mb-3">
                                        <label class="form-label">Course Fee</label>
                                        <input type="text" class="form-control" name="course_fee" value="{{ $cou->courseFee->price  ?? ""}}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Course Discout</label>
                                        <input type="text" class="form-control" name="course_discount" value="{{ $cou->courseFee->discount ?? "" }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Course Duration</label>
                                        <input type="text" class="form-control" name="course_duration" value="{{ $cou->courseFee->course_duration ?? "" }}" required>
                                    </div>

                                    <label for="payment_plan">Payment Plan:</label>
<select id="payment_plan" name="payment_plan" required style="width: 100%; padding: 10px; font-size: 16px;">
    <option value="one-time" {{ optional($cou->courseFee)->payment_plan === 'one-time' ? 'selected' : '' }}>One-Time Payment</option>
    <option value="monthly" {{ optional($cou->courseFee)->payment_plan === 'monthly' ? 'selected' : '' }}>Monthly Installments</option>
    <option value="quarterly" {{ optional($cou->courseFee)->payment_plan === 'quarterly' ? 'selected' : '' }}>Quarterly Installments</option>


</select>






                                    <button type="submit" class="btn btn-primary">Update Course</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </section>
</main>

<script>
    function toggleEditForm(courseId) {
        var editForm = document.getElementById('edit-form-' + courseId);
        editForm.style.display = (editForm.style.display === 'none' || editForm.style.display === '') ? 'table-row' : 'none';
    }

    function toggleAddForm() {
        var addForm = document.getElementById('add-form');
        addForm.style.display = (addForm.style.display === 'none' || addForm.style.display === '') ? 'block' : 'none';
    }

    function deleteCourse(courseId) {
        if (confirm('Are you sure you want to delete this course?')) {
            // Here you should send an AJAX request or form submission to delete the course
            // Example: window.location.href = "/delete-course/" + courseId;
        }
    }
</script>

@endsection
