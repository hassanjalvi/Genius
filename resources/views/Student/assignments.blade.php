@extends('Student.layots.main')

@section('title', 'Assignments')

@section('main-container')
<link rel="stylesheet" href="{{ asset('Admin/css/management.css') }}">

<main>
    <section id="student-assignments" style="margin-left: 100px">
        <div class="container">
            <h2>Assignments</h2>

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
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Assignment Title</th>
                            <th>Course</th>
                            <th>Download</th>
                            <th>Your Submission</th>
                            <th>Upload</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Static Row 1 --}}
                        <tr>
                            <td>1</td>
                            <td>OOP Concepts Assignment</td>
                            <td>Programming Fundamentals</td>
                            <td>
                                <a href="{{ asset('static_assignments/oop_assignment.pdf') }}" target="_blank">Download</a>
                            </td>
                            <td>
                                <a href="{{ asset('student_submissions/my_oop_solution.pdf') }}" target="_blank">View Submission</a>
                            </td>
                            <td>
                                <form method="POST" enctype="multipart/form-data">
                                    <input type="file" name="submission" class="form-control" required>
                                    <button class="btn btn-success mt-1">Upload</button>
                                </form>
                            </td>
                        </tr>

                        {{-- Static Row 2 --}}
                        <tr>
                            <td>2</td>
                            <td>Database Design</td>
                            <td>Database Systems</td>
                            <td>
                                <a href="{{ asset('static_assignments/db_assignment.docx') }}" target="_blank">Download</a>
                            </td>
                            <td>Not Submitted</td>
                            <td>
                                <form method="POST" enctype="multipart/form-data">
                                    <input type="file" name="submission" class="form-control" required>
                                    <button class="btn btn-success mt-1">Upload</button>
                                </form>
                            </td>
                        </tr>

                        {{-- Static Row 3 --}}
                        <tr>
                            <td>3</td>
                            <td>Web Development Assignment</td>
                            <td>Web Engineering</td>
                            <td>
                                <a href="{{ asset('static_assignments/web_assignment.zip') }}" target="_blank">Download</a>
                            </td>
                            <td>
                                <a href="{{ asset('student_submissions/web_solution.zip') }}" target="_blank">View Submission</a>
                            </td>
                            <td>
                                <form method="POST" enctype="multipart/form-data">
                                    <input type="file" name="submission" class="form-control" required>
                                    <button class="btn btn-success mt-1">Upload</button>
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
