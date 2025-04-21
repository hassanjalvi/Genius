@extends('Student.layots.main')

@section('title', 'My Progress')

@section('main-container')
<link rel="stylesheet" href="{{ asset('Admin/css/management.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    .progress-box {
        background-color: #ffffff;
        padding: 20px;
        margin: 40px auto;
        color: black;
        font-family: sans-serif;
        width: 80%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .filters {
        display: flex;
        gap: 20px;
        justify-content: center;
        margin-bottom: 20px;
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

    .btn-search {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
    }
</style>

<main>
    <section id="student-progress">
        <div class="progress-box" style="margin-left:270px">
            <h2 class="text-center mb-4">My Assignments & Quizzes Progress</h2>

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
                <button type="button" class="btn-search" onclick="applyFilters()">Filter</button>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Title</th>
                            <th>Course</th>
                            <th>Total Marks</th>
                            <th>Obtained Marks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Static Data for Student's Progress -->
                        <tr class="assignment-row" data-type="assignment" data-title="assignment 1" data-course="course 1" data-quiztype="">
                            <td>1</td>
                            <td>Assignment</td>
                            <td>Assignment 1</td>
                            <td>Course 1</td>
                            <td>50</td>
                            <td>45</td>
                        </tr>
                        <tr class="assignment-row" data-type="quiz" data-title="quiz 1" data-course="course 1" data-quiztype="pdf">
                            <td>2</td>
                            <td>Quiz</td>
                            <td>Quiz 1</td>
                            <td>Course 1</td>
                            <td>30</td>
                            <td>25</td>
                        </tr>
                        <tr class="assignment-row" data-type="assignment" data-title="assignment 2" data-course="course 2" data-quiztype="">
                            <td>3</td>
                            <td>Assignment</td>
                            <td>Assignment 2</td>
                            <td>Course 2</td>
                            <td>40</td>
                            <td>38</td>
                        </tr>
                        <tr class="assignment-row" data-type="quiz" data-title="quiz 2" data-course="course 2" data-quiztype="mcq">
                            <td>4</td>
                            <td>Quiz</td>
                            <td>Quiz 2</td>
                            <td>Course 2</td>
                            <td>30</td>
                            <td>28</td>
                        </tr>
                    </tbody>
                </table>
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
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
