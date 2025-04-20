@extends('Student.layots.main')

@section('title', 'Assignments')

@section('main-container')
<link rel="stylesheet" href="{{ asset('Admin/css/management.css') }}">

<main>
    <section id="student-assignments" style="margin-left: 100px">
        <div class="container">
            <h2>Assignments</h2>

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

            {{-- Toast message --}}
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
                }, 10000);
            </script>
            @endif

            <div class="assignments-list mt-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Assignment Title</th>
                            <th>Course</th>
                            <th>Download</th>
                            <th>Your Submission</th>
                            <th>Upload</th>
                            <th>mark</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assignment->assignment as $ass)
                        <tr>
                            <td>{{ $loop->iteration ?? ""}}</td>
                            <td>{{ $ass->assignment_title ?? ""}}</td>
                            <td>{{ $assignment->name ?? ""}}</td>
                            <td>
                                @if ($ass->assigment_file)
                                    <a href="{{ $ass->assigment_file ?? "" }}" target="_blank">Download</a>
                                @else
                                    No file available
                                @endif
                            </td>
                            <td>
                                @php
                                    // Check if the assignment submission relationship exists
                                    $submission = $ass->assignmentSubmission ? $ass->assignmentSubmission->where('student_id', Auth::id())->first() : null;
                                @endphp

                                @if (!empty($submission))
                                    <a href="{{$ass->assignmentSubmission->file}}" >View Submission</a>
                                    <br>
                                    @if ($submission->marks === null)
                                        <span class="text-warning">Pending</span> <!-- Show Pending if marks are null -->
                                    @else
                                        <span class="text-success">{{  ""}}</span> <!-- Show marks if they are not null -->
                                    @endif
                                @else
                                    <span class="text-muted">No Submission Yet</span>
                                @endif
                            </td>
                            <td>
                                @if ($submission)
                                    <button class="btn btn-secondary" disabled>Already Uploaded</button>
                                @else
                                    <form method="POST" action="{{ route('student.assignment.upload') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="course_id" value="{{ $assignment->id }}" class="form-control" required>
                                        <input type="hidden" name="assignment_id" value="{{ $ass->id }}" class="form-control" required>
                                        <input type="file" name="assignment_file" class="form-control" required>
                                        <button type="submit" class="btn btn-success mt-1">Upload</button>
                                    </form>
                                @endif
                            </td>
                            <td>{{ $ass->assignmentSubmission->marks ?? "pending"}}</td>

                        </tr>
                        @endforeach




                    </tbody>
                </table>

                <!-- SweetAlert for assignment already uploaded -->


            </div>
        </div>
    </section>
</main>
@endsection
