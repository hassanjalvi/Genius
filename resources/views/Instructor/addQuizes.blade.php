@section('title', 'Admin')
@extends('Instructor.layots.main')
@section('main-container')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course Quiz | @yield('title')</title>
    <link rel="stylesheet" href="{{asset('Admin/css/chefs.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/css/foodecart.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <section class="admin-panel">

        <h2>Add Course Quiz</h2>

        <form class="admin-form" action="{{ route('quiz.create') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="course_id">Select Course:</label>
            <select name="course_id" id="course_id" class="form-control" required>
                <option value="">-- Select Course --</option>
                @foreach ($courses as $cour)

                <option value="{{ $cour->id }}">{{$cour->name}}</option>
                @endforeach
                <!-- Add more dynamically -->
            </select>
            @error('course_id') <span class="text-danger">{{ $message }}</span> @enderror

            <!-- ✅ Added Quiz Number Field -->
            <label for="quiz_number">Quiz Number:</label>
            <input type="number" name="quiz_number" id="quiz_number" class="form-control" placeholder="Enter Quiz Number" required min="1">
            @error('quiz_number') <span class="text-danger">{{ $message }}</span> @enderror

            <label for="quiz_type">Quiz Type:</label>
            <select name="quiz_type" id="quiz_type" class="form-control" onchange="toggleQuizFields()" required>
                <option value="">-- Select Quiz Type --</option>
                <option value="pdf">PDF Quiz</option>
                <option value="mcq">mcq Quiz</option>
            </select>
            @error('quiz_type') <span class="text-danger">{{ $message }}</span> @enderror

            <!-- PDF Quiz Section -->
            <div id="pdf_quiz_section" style="display: none;">
                <label for="pdf_quiz_title">Quiz Title:</label>
                <input type="text" name="pdf_quiz_title" id="pdf_quiz_title" class="form-control" placeholder="Enter Quiz Title">
                @error('pdf_quiz_title') <span class="text-danger">{{ $message }}</span> @enderror

                <label for="pdf_quiz_file">Upload PDF (Quiz File):</label>
                <input type="file" name="pdf_quiz_file" id="pdf_quiz_file" class="form-control" accept=".pdf,.doc,.docx">
                @error('pdf_quiz_file') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- mcq Section -->
            <div id="mcq_quiz_section" style="display: none;">
                <label for="mcq_title">Quiz Title:</label>
                <input type="text" name="mcq_title" id="mcq_title" class="form-control" placeholder="Enter Quiz Title">
                @error('mcq_title') <span class="text-danger">{{ $message }}</span> @enderror

                <!-- Number of mcq -->
                <div id="mcq-number-section">
                    <label for="mcq_count">How many mcq do you want to enter?</label>
                    <input type="number" name="mcq_count" id="mcq_count" class="form-control" placeholder="Enter Number of mcq" min="1" >
                    <button type="button" class="btn btn-secondary mt-2" onclick="generatemcqFields()">Generate mcq</button>
                    @error('mcq_count') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div id="mcq-container"></div>

            </div>

            <br><br>
            <button type="submit" class="btn btn-primary">Submit Quiz</button>
        </form>

        <section class="manage-instructors-button">
            <a href="{{route('mycourses.quiz.manage')}}" class="btn">Manage Quizzes</a>
        </section>

    </section>
</body>

<style>
    .admin-panel {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 40px 20px;
    }

    .admin-form {
        width: 100%;
        max-width: 700px;
        margin-bottom: 30px;
    }

    .manage-instructors-button {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .manage-instructors-button .btn {
        background-color: #0056b3;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 16px;
        text-decoration: none;
    }

    .manage-instructors-button .btn:hover {
        background-color: #003f7f;
    }
</style>

<!-- Bootstrap JS & Dynamic Script -->
<script>
    function toggleQuizFields() {
        const quizType = document.getElementById('quiz_type').value;
        document.getElementById('pdf_quiz_section').style.display = quizType === 'pdf' ? 'block' : 'none';
        document.getElementById('mcq_quiz_section').style.display = quizType === 'mcq' ? 'block' : 'none';
    }

    function generatemcqFields() {
        const mcqCount = document.getElementById('mcq_count').value;
        const container = document.getElementById('mcq-container');
        container.innerHTML = ''; // Clear any existing MCQ fields

        for (let i = 0; i < mcqCount; i++) {
            const mcqItem = document.createElement('div');
            mcqItem.classList.add('mcq-item', 'mb-4', 'border', 'rounded', 'p-3');
            mcqItem.innerHTML = `
                <label>Question ${i + 1}:</label>
                <input type="text" name="questions[]" class="form-control" placeholder="Enter Question">

                <label>Option A:</label>
                <input type="text" name="option_a[]" class="form-control" placeholder="Option A">

                <label>Option B:</label>
                <input type="text" name="option_b[]" class="form-control" placeholder="Option B">

                <label>Option C:</label>
                <input type="text" name="option_c[]" class="form-control" placeholder="Option C">

                <label>Option D:</label>
                <input type="text" name="option_d[]" class="form-control" placeholder="Option D">

                <label>Correct Answer:</label>
                <select name="correct_answers[]" class="form-control">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>

                <label>Description (Optional):</label>
                <textarea name="descriptions[]" class="form-control" rows="2" placeholder="Explain the answer (optional)"></textarea>
            `;
            container.appendChild(mcqItem);
        }
    }
</script>

</html>
@endsection
