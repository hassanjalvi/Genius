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
        .mcq-item {
            background-color: #f8f9fa;
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 5px;
        }
        .text-danger {
            font-size: 0.875em;
        }
        .required-field::after {
            content: " *";
            color: red;
        }
    </style>
</head>

<body>
    <section class="admin-panel">
        <h2>Add Course Quiz</h2>

        <form class="admin-form" action="{{ route('quiz.create') }}" method="POST" enctype="multipart/form-data" id="quizForm">
            @csrf

            <div class="form-group mb-3">
                <label for="course_id" class="required-field">Select Course:</label>
                <select name="course_id" id="course_id" class="form-control" required>
                    <option value="">-- Select Course --</option>
                    @foreach ($courses as $cour)
                    <option value="{{ $cour->id }}" {{ old('course_id') == $cour->id ? 'selected' : '' }}>{{$cour->name}}</option>
                    @endforeach
                </select>
                @error('course_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mb-3">
                <label for="quiz_number" class="required-field">Quiz Number:</label>
                <input type="number" name="quiz_number" id="quiz_number" class="form-control"
                       placeholder="Enter Quiz Number" required min="1" value="{{ old('quiz_number') }}">
                @error('quiz_number') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mb-3">
                <label for="quiz_type" class="required-field">Quiz Type:</label>
                <select name="quiz_type" id="quiz_type" class="form-control" onchange="toggleQuizFields()" required>
                    <option value="">-- Select Quiz Type --</option>
                    <option value="pdf" {{ old('quiz_type') == 'pdf' ? 'selected' : '' }}>PDF Quiz</option>
                    <option value="mcq" {{ old('quiz_type') == 'mcq' ? 'selected' : '' }}>MCQ Quiz</option>
                </select>
                @error('quiz_type') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- PDF Quiz Section -->
            <div id="pdf_quiz_section" style="display: none;">
                <div class="form-group mb-3">
                    <label for="pdf_quiz_title" class="required-field">Quiz Title:</label>
                    <input type="text" name="pdf_quiz_title" id="pdf_quiz_title" class="form-control"
                           placeholder="Enter Quiz Title" value="{{ old('pdf_quiz_title') }}">
                    @error('pdf_quiz_title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="pdf_quiz_file" class="required-field">Upload PDF (Quiz File):</label>
                    <input type="file" name="pdf_quiz_file" id="pdf_quiz_file" class="form-control"
                           accept=".pdf,.doc,.docx">
                    @error('pdf_quiz_file') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="total_mark" class="required-field">Total Marks</label>
                    <input type="number" name="total_mark" id="total_mark" class="form-control"
                           value="{{ old('total_mark') }}" min="1">
                    @error('total_mark') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- MCQ Section -->
            <div id="mcq_quiz_section" style="display: none;">
                <div class="form-group mb-3">
                    <label for="mcq_title" class="required-field">Quiz Title:</label>
                    <input type="text" name="mcq_title" id="mcq_title" class="form-control"
                           placeholder="Enter Quiz Title" value="{{ old('mcq_title') }}">
                    @error('mcq_title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div id="mcq-number-section" class="form-group mb-3">
                    <label for="mcq_count" class="required-field">How many questions do you want to add?</label>
                    <input type="number" name="mcq_count" id="mcq_count" class="form-control"
                           placeholder="Enter number of questions" min="1" value="{{ old('mcq_count', 1) }}">
                    <button type="button" class="btn btn-secondary mt-2" onclick="generateMcqFields()">Generate Questions</button>
                    @error('mcq_count') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Hidden input for MCQ total marks -->
                <input type="hidden" name="total_mark_mcq" id="total_mark_mcq" value="{{ old('total_mark_mcq', 0) }}">

                <div id="mcq-container" class="mt-4">
                    @php
                        $oldMcqs = old('mcqs', []);
                    @endphp

                    @if(count($oldMcqs) > 0)
                        @foreach($oldMcqs as $i => $mcq)
                            <div class="mcq-item">
                                <input type="hidden" name="mcqs[{{$i}}][type]" value="mcq">
                                <h5>Question {{ $i + 1 }}</h5>

                                <div class="form-group mb-3">
                                    <label class="required-field">Question Text</label>
                                    <input type="text" name="mcqs[{{$i}}][question]" class="form-control"
                                           value="{{ $mcq['question'] ?? '' }}" required>
                                    @error("mcqs.$i.question") <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="required-field">Option A</label>
                                            <input type="text" name="mcqs[{{$i}}][options][A]" class="form-control"
                                                   value="{{ $mcq['options']['A'] ?? '' }}" required>
                                            @error("mcqs.$i.options.A") <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="required-field">Option B</label>
                                            <input type="text" name="mcqs[{{$i}}][options][B]" class="form-control"
                                                   value="{{ $mcq['options']['B'] ?? '' }}" required>
                                            @error("mcqs.$i.options.B") <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="required-field">Option C</label>
                                            <input type="text" name="mcqs[{{$i}}][options][C]" class="form-control"
                                                   value="{{ $mcq['options']['C'] ?? '' }}" required>
                                            @error("mcqs.$i.options.C") <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="required-field">Option D</label>
                                            <input type="text" name="mcqs[{{$i}}][options][D]" class="form-control"
                                                   value="{{ $mcq['options']['D'] ?? '' }}" required>
                                            @error("mcqs.$i.options.D") <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="required-field">Correct Answer</label>
                                    <select name="mcqs[{{$i}}][correct_answer]" class="form-control" required>
                                        <option value="">-- Select Correct Answer --</option>
                                        <option value="A" @if(isset($mcq['correct_answer']) && $mcq['correct_answer'] == 'A') selected @endif>Option A</option>
                                        <option value="B" @if(isset($mcq['correct_answer']) && $mcq['correct_answer'] == 'B') selected @endif>Option B</option>
                                        <option value="C" @if(isset($mcq['correct_answer']) && $mcq['correct_answer'] == 'C') selected @endif>Option C</option>
                                        <option value="D" @if(isset($mcq['correct_answer']) && $mcq['correct_answer'] == 'D') selected @endif>Option D</option>
                                    </select>
                                    @error("mcqs.$i.correct_answer") <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label>Explanation (Optional)</label>
                                    <textarea name="mcqs[{{$i}}][description]" class="form-control" rows="2">{{ $mcq['description'] ?? '' }}</textarea>
                                    @error("mcqs.$i.description") <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <br><br>
            <button type="submit" class="btn btn-primary">Submit Quiz</button>
        </form>

        <section class="manage-instructors-button">
            <a href="{{route('mycourses.quiz.manage')}}" class="btn">Manage Quizzes</a>
        </section>
    </section>

    <script>
        // Initialize the form based on previously selected quiz type
        document.addEventListener('DOMContentLoaded', function() {
            const quizType = document.getElementById('quiz_type').value;
            toggleQuizFields();

            // If there are old MCQ inputs, set the total marks
            const oldMcqs = @json(old('mcqs', []));
            if (oldMcqs.length > 0 && quizType === 'mcq') {
                document.getElementById('total_mark_mcq').value = oldMcqs.length;
            }
        });

        function toggleQuizFields() {
            const quizType = document.getElementById('quiz_type').value;
            const pdfSection = document.getElementById('pdf_quiz_section');
            const mcqSection = document.getElementById('mcq_quiz_section');

            // Hide both sections first
            pdfSection.style.display = 'none';
            mcqSection.style.display = 'none';

            // Show only the selected one
            if (quizType === 'pdf') {
                pdfSection.style.display = 'block';
                // Make PDF fields required
                document.getElementById('pdf_quiz_title').setAttribute('required', 'required');
                document.getElementById('pdf_quiz_file').setAttribute('required', 'required');
                document.getElementById('total_mark').setAttribute('required', 'required');
                // Remove required from MCQ fields
                document.getElementById('mcq_title').removeAttribute('required');
                document.getElementById('mcq_count').removeAttribute('required');
            } else if (quizType === 'mcq') {
                mcqSection.style.display = 'block';
                // Make MCQ fields required
                document.getElementById('mcq_title').setAttribute('required', 'required');
                document.getElementById('mcq_count').setAttribute('required', 'required');
                // Remove required from PDF fields
                document.getElementById('pdf_quiz_title').removeAttribute('required');
                document.getElementById('pdf_quiz_file').removeAttribute('required');
                document.getElementById('total_mark').removeAttribute('required');
            }
        }

        function generateMcqFields() {
            const mcqCount = document.getElementById('mcq_count').value;
            const container = document.getElementById('mcq-container');
            const totalMarkInput = document.getElementById('total_mark_mcq');

            if (!mcqCount || mcqCount < 1) {
                alert('Please enter a valid number of questions');
                return;
            }

            container.innerHTML = '';

            // Set total marks equal to the number of questions (1 mark per question)
            totalMarkInput.value = mcqCount;

            for (let i = 0; i < mcqCount; i++) {
                const mcqItem = document.createElement('div');
                mcqItem.classList.add('mcq-item');
                mcqItem.innerHTML = `
                    <input type="hidden" name="mcqs[${i}][type]" value="mcq">
                    <h5>Question ${i + 1}</h5>

                    <div class="form-group mb-3">
                        <label class="required-field">Question Text</label>
                        <input type="text" name="mcqs[${i}][question]" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="required-field">Option A</label>
                                <input type="text" name="mcqs[${i}][options][A]" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="required-field">Option B</label>
                                <input type="text" name="mcqs[${i}][options][B]" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="required-field">Option C</label>
                                <input type="text" name="mcqs[${i}][options][C]" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="required-field">Option D</label>
                                <input type="text" name="mcqs[${i}][options][D]" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="required-field">Correct Answer</label>
                        <select name="mcqs[${i}][correct_answer]" class="form-control" required>
                            <option value="">-- Select Correct Answer --</option>
                            <option value="A">Option A</option>
                            <option value="B">Option B</option>
                            <option value="C">Option C</option>
                            <option value="D">Option D</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Explanation (Optional)</label>
                        <textarea name="mcqs[${i}][description]" class="form-control" rows="2"></textarea>
                    </div>
                `;
                container.appendChild(mcqItem);
            }
        }

        // Form validation before submission
        document.getElementById('quizForm').addEventListener('submit', function(e) {
            const quizType = document.getElementById('quiz_type').value;

            if (quizType === 'pdf') {
                // Validate PDF fields
                const pdfTitle = document.getElementById('pdf_quiz_title');
                const pdfFile = document.getElementById('pdf_quiz_file');
                const totalMark = document.getElementById('total_mark');

                if (!pdfTitle.value) {
                    e.preventDefault();
                    alert('Please enter PDF quiz title');
                    pdfTitle.focus();
                    return;
                }

                if (!totalMark.value || totalMark.value < 1) {
                    e.preventDefault();
                    alert('Please enter valid total marks (minimum 1)');
                    totalMark.focus();
                    return;
                }

                if (!pdfFile.files.length) {
                    e.preventDefault();
                    alert('Please upload a PDF file');
                    return;
                }
            }
            else if (quizType === 'mcq') {
                // Validate MCQ fields
                const mcqTitle = document.getElementById('mcq_title');
                const mcqCount = document.getElementById('mcq_count');
                const mcqContainer = document.getElementById('mcq-container');

                if (!mcqTitle.value) {
                    e.preventDefault();
                    alert('Please enter MCQ quiz title');
                    mcqTitle.focus();
                    return;
                }

                if (!mcqCount.value || mcqCount.value < 1) {
                    e.preventDefault();
                    alert('Please enter a valid number of questions');
                    mcqCount.focus();
                    return;
                }

                // Validate generated MCQ questions
                const mcqItems = mcqContainer.querySelectorAll('.mcq-item');
                if (mcqItems.length === 0) {
                    e.preventDefault();
                    alert('Please generate questions first');
                    return;
                }

                for (let item of mcqItems) {
                    const question = item.querySelector('input[name*="[question]"]');
                    const options = item.querySelectorAll('input[name*="[options]"]');
                    const correctAnswer = item.querySelector('select[name*="[correct_answer]"]');

                    if (!question.value) {
                        e.preventDefault();
                        alert('Please fill all question fields');
                        question.focus();
                        return;
                    }

                    for (let option of options) {
                        if (!option.value) {
                            e.preventDefault();
                            alert('Please fill all option fields');
                            option.focus();
                            return;
                        }
                    }

                    if (!correctAnswer.value) {
                        e.preventDefault();
                        alert('Please select correct answer for all questions');
                        return;
                    }
                }

                // Automatically set total marks to number of questions
                document.getElementById('total_mark_mcq').value = mcqItems.length;
            }
        });
    </script>
</body>
</html>
@endsection
