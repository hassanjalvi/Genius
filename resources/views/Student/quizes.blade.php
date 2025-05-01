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

                        @foreach ($quiz as $q )
                        <tr>
                            <td>{{$loop->iteration ?? ""}}</td>
                            <td>{{$q->type ?? ""}}</td>
                            <td>{{$q->title ?? ""}}</td>
                            <td>{{$q->course->name ?? ""}}</td>



                            <td style="display: flex; align-items: center; gap: 10px;">
                                @if ($q->type==='mcq')
                                <p  class="btn btn-sm btn-info">-----------</p>
                                @endif
                                @if ($q->type==='pdf')
                                <a href="{{ $q->file ?? "" }}" download class="btn btn-sm btn-info">Download</a>

                               @php

    $submission = $q->quizSubmission->first(); // Get the first (or only) submission
@endphp

@if (is_null($submission) || is_null($submission->file))
    <form action="{{ route('student.submit.mcq') }}" method="POST" enctype="multipart/form-data" style="display:inline-block;" id="uploadForm">
        @csrf
        <input type="hidden" name="course_id" value="{{ $q->course->id }}">
        <input type="hidden" name="quiz_id" value="{{ $q->id }}">

        <input type="file" name="assignment_file" id="assignmentFile" style="display: none;" onchange="document.getElementById('uploadForm').submit();">

        <label for="assignmentFile" class="btn btn-sm btn-warning">Upload Answer</label>
    </form>
@else
    <p>Quiz completed</p>
@endif

                                <script>
                                    // Submit form when file is selected
                                    document.getElementById('assignmentFile').addEventListener('change', function() {
                                        document.getElementById('uploadForm').submit();
                                    });
                                </script>

                                @endif

                                @if ($q->type==='mcq')




                                {{-- @if() --}}
                                @if (is_null($submission) || is_null($submission->file))

                                <a href="{{route('student.mycourses.attempt.quizes',$q->id)}}" class="btn btn-sm btn-success">Attempt Quiz</a>

                                @else
    <p>Quiz completed</p>
@endif



                                @endif

                            </td>


                        </tr>
                        @endforeach


                        <!-- MCQ Quiz -->



                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
@endsection
