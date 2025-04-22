@extends('Instructor.layots.main')

@section('title', 'Manage Quizzes')

@section('main-container')
<link rel="stylesheet" href="{{ asset('Admin/css/management.css') }}">

<main>
    <section id="manage-quizzes" style="margin-left: 100px">
        <div class="container">
            <h2>Manage Quizzes</h2>
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

            <button class="btn btn-success" onclick="window.location='{{ route('mycourses.quizes.add') }}'">Add New Quiz</button>

            <br><br>

            <div class="quizzes-list">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Title</th>
                            <th>Course</th>
                            <th>Total Mark</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- Example Quiz Row -->

                        @foreach ($course as  $singleCourse)
                        @foreach($singleCourse->courseQuiz as $quiz)

                        <tr>
                            <td>{{$quiz->id ?? ""}}</td>
                            <td>
                                @if($quiz->type === 'pdf')
                                    <a href="{{ $quiz->documnet }}" target="_blank" class="btn btn-primary btn-sm">View</a>
                                @else
                                    {{ ucfirst($quiz->type) }}
                                @endif
                            </td>
                            <td>{{$quiz->title ?? ""}}</td>
                            <td>{{$singleCourse->name}}</td>
                            <td>{{$quiz->total_mark ?? ""}}</td>

                            <td>
                                {{-- <a href="{{ asset('storage/quizzes/laravel_quiz.pdf') }}" target="_blank" class="btn btn-sm btn-info">View</a> --}}
                                {{-- <button class="btn btn-primary" onclick="toggleEditForm(1)">
                                    <i class="fas fa-edit"></i>
                                </button> --}}
                                <div style="display: inline-block;">

                                    <form action="{{ route('quiz.delete', $quiz->id) }}"  method="POST" onsubmit="return confirm('Are you sure you want to delete this assignment?');">
                                        @csrf
                                        @method('DELETE')
                                <button class="btn btn-danger delete-btn" ><i class="fas fa-trash"></i></button>
                                    </form>
                            </div>
                            </td>
                        </tr>

                        <!-- Edit Quiz Form -->
                        <tr id="edit-form-1" style="display: none;">
                            <td colspan="5">
                                <form action="#" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Quiz Title</label>
                                        <input type="text" class="form-control" name="title" value="Laravel Basics Quiz" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Quiz Type</label>
                                        <select name="quiz_type" class="form-control" required>
                                            <option value="pdf" selected>PDF</option>
                                            <option value="mcq">MCQ</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Course</label>
                                        <select class="form-control" name="course_id" required>
                                            <option value="1" selected>Course1</option>
                                            <option value="2">Course2</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Quiz File (PDF) or MCQ Data</label>
                                        <input type="file" name="quiz_file" class="form-control">
                                        <!-- For MCQ, you can show a dynamic section via JS if quiz_type == mcq -->
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Quiz</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>

<script>
    function toggleEditForm(quizId) {
        const editForm = document.getElementById('edit-form-' + quizId);
        editForm.style.display = (editForm.style.display === 'none' || editForm.style.display === '') ? 'table-row' : 'none';
    }

    function toggleAddForm() {
        alert('Add Quiz Form toggle not implemented yet.');
    }
</script>
@endsection
