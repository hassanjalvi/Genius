@extends('Admin.layots.main')

@section('title', 'Manage Quizzes')

@section('main-container')
<link rel="stylesheet" href="{{ asset('Admin/css/management.css') }}">

<main>
    <section id="manage-quizzes" style="margin-left: 100px">
        <div class="container">
            <h2>Manage Quizzes</h2>
            <button class="btn btn-success"  href="{{route('mycourses.quizes.add')}}">Add New Quiz</button>
            <br><br>

            <div class="quizzes-list">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Type</th>
                            <th>Title</th>
                            <th>Course</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- Example Quiz Row -->
                        <tr>
                            <td>1</td>
                            <td>PDF</td>
                            <td>Laravel Basics Quiz</td>
                            <td>Course1</td>
                            <td>
                                <a href="{{ asset('storage/quizzes/laravel_quiz.pdf') }}" target="_blank" class="btn btn-sm btn-info">View</a>
                                <button class="btn btn-primary" onclick="toggleEditForm(1)">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="#" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this quiz?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
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