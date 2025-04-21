@extends('Instructor.layots.main')

@section('title', 'Manage Assignments & Quizzes')

@section('main-container')
<link rel="stylesheet" href="{{ asset('Admin/css/management.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    .advanced-search-form {
        background-color: white;
        padding: 20px;
        color: black;
        display: flex;
        flex-direction: column;
        gap: 20px;
        font-family: sans-serif;
        width: 60%;
        margin: 0 auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .filters {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .filters select {
        background-color: transparent;
        color: black;
        border: none;
        border-bottom: 1px solid #888;
        padding: 10px;
        width: 180px;
        font-size: 14px;
        appearance: none;
    }

    .filters select:focus {
        outline: none;
        border-color: black;
    }

    .actions {
        display: flex;
        justify-content: center;
        gap: 20px;
        font-size: 14px;
    }

    .btn-search {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
    }

    .container {
        max-width: 90%;
        margin: 0 auto;
    }
</style>

<main>
    <section id="manage-assignments" style="padding: 10px 0;"  > 
       
            <h2 class="text-center mb-4" style="margin-left: 230px">Assign Assignment and Quiz Numbers</h2>

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
                    setTimeout(() => {
                        document.getElementById('toast-success')?.remove();
                    }, 10000);
                </script>
            @endif

            <!-- Filters -->
            <form class="advanced-search-form" onsubmit="event.preventDefault(); applyFilters();" style="margin-left: 400px">
                <div class="filters">
                    <select id="filter-type">
                        <option value="">CONTENT TYPE</option>
                        <option value="assignment">Assignment</option>
                        <option value="quiz">Quiz</option>
                    </select>
                    <select id="filter-title">
                        <option value="">TITLE</option>
                        <option value="assignment 1">Assignment 1</option>
                        <option value="assignment 2">Assignment 2</option>
                        <option value="quiz 1">Quiz 1</option>
                        <option value="quiz 2">Quiz 2</option>
                    </select>
                    <select id="filter-course">
                        <option value="">COURSE</option>
                        <option value="course 1">Course 1</option>
                        <option value="course 2">Course 2</option>
                    </select>
                    <select id="filter-quiz-type">
                        <option value="">QUIZ TYPE</option>
                        <option value="pdf">PDF</option>
                        <option value="mcq">MCQ</option>
                    </select>
                </div>
                <div class="actions">
                    <button type="submit" class="btn-search">Filter</button>
                </div>
            </form>

            <!-- Assignment Table -->
            <div class="assignments-list mt-5" style="margin-left:270px">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>File</th>
                            <th>Title</th>
                            <th>Course</th>
                            <th>Student Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $dummyData = [
                                ['id' => 1, 'title' => 'Assignment 1', 'file' => '#', 'course' => 'Course 1', 'type' => 'assignment', 'quiz_type' => '', 'student' => 'Ali Khan'],
                                ['id' => 2, 'title' => 'Quiz 1', 'file' => '#', 'course' => 'Course 2', 'type' => 'quiz', 'quiz_type' => 'PDF', 'student' => 'Sara Ahmed'],
                                ['id' => 3, 'title' => 'Quiz 2', 'file' => '#', 'course' => 'Course 1', 'type' => 'quiz', 'quiz_type' => 'MCQ', 'student' => 'Hamza Tariq'],
                                ['id' => 4, 'title' => 'Assignment 2', 'file' => '#', 'course' => 'Course 2', 'type' => 'assignment', 'quiz_type' => '', 'student' => 'Fatima Noor'],
                            ];
                        @endphp
                        @foreach($dummyData as $data)
                            <tr class="assignment-row"
                                data-type="{{ $data['type'] }}"
                                data-title="{{ strtolower($data['title']) }}"
                                data-course="{{ strtolower($data['course']) }}"
                                data-quiztype="{{ strtolower($data['quiz_type']) }}">
                                <td>{{ $data['id'] }}</td>
                                <td><a href="{{ $data['file'] }}" target="_blank">View</a></td>
                                <td>{{ $data['title'] }}</td>
                                <td>{{ $data['course'] }}</td>
                                <td>{{ $data['student'] }}</td>
                                <td>
                                    <button class="btn btn-success btn-sm upload-btn" style="background:#007bff "
                                            data-student="{{ $data['student'] }}"
                                            data-title="{{ $data['title'] }}">
                                        Upload Number
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="marksForm">
                            <div class="modal-header">
                                <h5 class="modal-title" id="uploadModalLabel">Upload Marks</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="assignedMarks" class="form-label">Assigned Marks</label>
                                    <input type="number" class="form-control" id="assignedMarks" required>
                                </div>
                                <div class="mb-3">
                                    <label for="totalMarks" class="form-label">Total Marks</label>
                                    <input type="number" class="form-control" id="totalMarks" required>
                                </div>
                                <input type="hidden" id="studentName">
                                <input type="hidden" id="titleName">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
</main>

<script>
    function applyFilters() {
        const type = document.getElementById('filter-type').value.toLowerCase();
        const title = document.getElementById('filter-title').value.toLowerCase();
        const course = document.getElementById('filter-course').value.toLowerCase();
        const quizType = document.getElementById('filter-quiz-type').value.toLowerCase();

        document.querySelectorAll('.assignment-row').forEach(row => {
            const rowType = row.dataset.type;
            const rowTitle = row.dataset.title;
            const rowCourse = row.dataset.course;
            const rowQuizType = row.dataset.quiztype;

            const matchesType = !type || rowType === type;
            const matchesTitle = !title || rowTitle.includes(title);
            const matchesCourse = !course || rowCourse.includes(course);
            const matchesQuizType = !quizType || rowQuizType === quizType || rowType === 'assignment';

            row.style.display = (matchesType && matchesTitle && matchesCourse && matchesQuizType) ? '' : 'none';
        });
    }

    document.addEventListener("DOMContentLoaded", function () {
        const modalEl = document.getElementById('uploadModal');
        const modal = new bootstrap.Modal(modalEl);
        const marksForm = document.getElementById('marksForm');

        document.querySelectorAll('.upload-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.getElementById('studentName').value = btn.dataset.student;
                document.getElementById('titleName').value = btn.dataset.title;
                modal.show();
            });
        });

        marksForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const assigned = document.getElementById('assignedMarks').value;
            const total = document.getElementById('totalMarks').value;
            const student = document.getElementById('studentName').value;
            const title = document.getElementById('titleName').value;

            console.log(`Student: ${student}, Title: ${title}, Assigned: ${assigned}, Total: ${total}`);

            modal.hide();
            marksForm.reset();
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
