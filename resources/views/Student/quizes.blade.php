@extends('Student.layots.main')

@section('title', ' Quizzes')

@section('main-container')
<link rel="stylesheet" href="{{ asset('Admin/css/management.css') }}">

<main>
    <section id="manage-quizzes" style="margin-left: 100px">
        <div class="container">
            <h2>Available Quizzes</h2>

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
                    to {
                        opacity: 0;
                        transform: translateY(-20px);
                        visibility: hidden;
                    }
                }
            </style>

            <script>
                setTimeout(function () {
                    let toast = document.getElementById('toast-success');
                    if (toast) {
                        toast.remove();
                    }
                }, 10000); // 10 seconds
            </script>
            @endif

            <br>

            <div class="quizzes-list">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Title</th>
                            <th>Course</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Static Data for Demo -->

                        <!-- PDF Quiz 1 -->
                        <tr>
                            <td>1</td>
                            <td>Pdf</td>
                            <td>Introduction to Laravel</td>
                            <td>Laravel Basics</td>
                            <td>
                                <a href="{{ asset('quizzes/sample_quiz_1.pdf') }}" download class="btn btn-sm btn-info">Download</a>

                                <form action="#" method="POST" enctype="multipart/form-data" style="display:inline-block;">
                                    @csrf
                                    <input type="file" name="student_answer" style="display: none;" id="upload1" onchange="this.form.submit()">
                                    <label for="upload1" class="btn btn-sm btn-warning">Upload Answer</label>
                                </form>
                            </td>
                        </tr>

                        <!-- MCQ Quiz -->
                        <tr>
                            <td>2</td>
                            <td>MCQ</td>
                            <td>Laravel MCQ Quiz</td>
                            <td>Laravel Basics</td>
                            <td>
                                <a href="{{route('student.mycourses.attempt.quizes')}}" class="btn btn-sm btn-success">Attempt Quiz</a>
                            </td>
                        </tr>

                        <!-- PDF Quiz 2 -->
                        <tr>
                            <td>3</td>
                            <td>pdf</td>
                            <td>HTML Basics</td>
                            <td>Web Development</td>
                            <td>
                                <a href="{{ asset('quizzes/sample_quiz_2.pdf') }}" download class="btn btn-sm btn-info">Download</a>

                                <form action="#" method="POST" enctype="multipart/form-data" style="display:inline-block;">
                                    @csrf
                                    <input type="file" name="student_answer" style="display: none;" id="upload2" onchange="this.form.submit()">
                                    <label for="upload2" class="btn btn-sm btn-warning">Upload Answer</label>
                                </form>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
@endsection
