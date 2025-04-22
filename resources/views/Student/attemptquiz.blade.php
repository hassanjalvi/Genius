@extends('Student.layots.main')

@section('title', 'Attempt Quizzes')
@section('main-container')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<style>
    body {
        background-color: #f0f2f5;
        min-height: 100vh;
        display: flex;
        align-items: center;
        font-family: 'Segoe UI', sans-serif;
    }

    .quiz-container {
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        padding: 30px;
        max-width: 650px;
        width: 100%;
        margin: auto;
        transition: all 0.5s ease-in-out;
    }

    .quiz-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .question {
        font-size: 1.3rem;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .options {
        display: grid;
        gap: 12px;
    }

    .option {
        background-color: #f8f9fa;
        border: 2px solid #dee2e6;
        border-radius: 10px;
        padding: 15px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .option:hover {
        background-color: #e9ecef;
    }

    .option.selected {
        background-color: #cfe2ff;
        border-color: #0d6efd;
    }

    .option.correct {
        background-color: #d4edda;
        border-color: #28a745;
    }

    .option.incorrect {
        background-color: #f8d7da;
        border-color: #dc3545;
    }

    .quiz-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 30px;
    }

    .timer {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .timer.low {
        color: red;
        animation: blink 1s step-end infinite;
    }

    @keyframes blink {
        50% {
            opacity: 0;
        }
    }



    .results {
        text-align: center;
    }

    .result-icon {
        font-size: 4rem;
        margin-bottom: 20px;
    }

    .score {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 20px;
    }
</style>
<center>
    <div class="container" >
        <div class="quiz-container" id="quiz" style="margin-left:250px">
            <div class="quiz-header">
                <h2> Quiz</h2>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
            <div id="question-container">
                <p class="question" id="question"></p>
                <div class="options" id="options"></div>
            </div>
            <div class="quiz-footer">
                <div class="timer" id="timer">Time: 30s</div>
                <button class="btn btn-primary" id="next-btn" disabled>Next</button>
            </div>
        </div>
    </div>
</center>


<script>
   const quizData = [
        @foreach($quiz as $q)
            {
                question: "{{ addslashes($q->question) }}",
                options: [
                    "{{ addslashes($q->options->option_a ?? '') }}",
                    "{{ addslashes($q->options->option_b ?? '') }}",
                    "{{ addslashes($q->options->option_c ?? '') }}",
                    "{{ addslashes($q->options->option_d ?? '') }}"
                ],
                correct:
                    @php
                        $correct = strtolower($q->correct_option); // 'a', 'b', 'c', 'd'
                        $map = ['a' => 0, 'b' => 1, 'c' => 2, 'd' => 3];
                        echo $map[$correct] ?? 0;
                    @endphp
            }@if(!$loop->last),@endif
        @endforeach
    ];

    let currentQuestion = 0;
    let score = 0;
    let timer;
    let timeLeft = 30;

    const questionEl = document.getElementById('question');
    const optionsEl = document.getElementById('options');
    const nextBtn = document.getElementById('next-btn');
    const timerEl = document.getElementById('timer');
    const progressBar = document.querySelector('.progress-bar');
    const quizContainer = document.getElementById('quiz');

    function loadQuestion() {
        const question = quizData[currentQuestion];
        questionEl.textContent = question.question;
        optionsEl.innerHTML = '';
        nextBtn.disabled = true;

        question.options.forEach((option, index) => {
            const button = document.createElement('button');
            button.textContent = `${index + 1}. ${option}`;
            button.classList.add('option');
            button.addEventListener('click', () => selectOption(button, index));
            optionsEl.appendChild(button);
        });

        timeLeft = 30;
        clearInterval(timer);
        startTimer();
        updateProgress();
    }

    function selectOption(selectedButton, optionIndex) {
        if (document.querySelector('.option.selected')) return;

        selectedButton.classList.add('selected');
        nextBtn.disabled = false;
        checkAnswer(optionIndex);
    }

    function checkAnswer(optionIndex) {
        const correctIndex = quizData[currentQuestion].correct;
        const buttons = optionsEl.querySelectorAll('.option');

        buttons.forEach((btn, idx) => {
            btn.disabled = true;
            if (idx === correctIndex) {
                btn.classList.add('correct');
            } else if (idx === optionIndex) {
                btn.classList.add('incorrect');
            }
        });

        if (optionIndex === correctIndex) score++;
        clearInterval(timer);
    }

    function updateProgress() {
        const progress = ((currentQuestion) / quizData.length) * 100;
        progressBar.style.width = `${progress}%`;
        progressBar.setAttribute('aria-valuenow', progress);
    }

    function showResults() {
        quizContainer.innerHTML = `
          <form method="POST" action="{{ route('mcq.mark') }}">
               @csrf
            <input type="hidden" name="score" value="${score}">
                        <input type="hidden" name="quiz_id" value="{{ $quiz->first()->quiz_id }}">
                                                <input type="hidden" name="course" value="{{ $course_id->course_id }}">


            <div class="results">
                <div class="result-icon">
                    <i class="fas ${score >= quizData.length / 2 ? 'fa-trophy text-success' : 'fa-times-circle text-danger'}"></i>
                </div>
                <div class="score">Your score: ${score}/${quizData.length}</div>
                <p>${score >= quizData.length / 2 ? 'Great job!' : 'Keep practicing!'}</p>
                <button class="btn btn-primary" onclick="location.reload()">Restart Quiz</button>
                                <button type="submit" class="btn btn-primary">Submit Score</button>

            </div>
             </form>
        `;
    }

    function startTimer() {
        timerEl.classList.remove('low');
        timer = setInterval(() => {
            timeLeft--;
            timerEl.textContent = `Time: ${timeLeft}s`;
            if (timeLeft <= 5) timerEl.classList.add('low');
            if (timeLeft <= 0) {
                clearInterval(timer);
                timerEl.textContent = `Time's up!`;
                nextBtn.disabled = false;
                checkAnswer(-1); // No selection made
            }
        }, 1000);
    }

    nextBtn.addEventListener('click', () => {
        currentQuestion++;
        if (currentQuestion < quizData.length) {
            loadQuestion();
        } else {
            updateProgress();
            showResults();
        }
    });

    // Keyboard Shortcuts (1-4)
    document.addEventListener('keydown', (e) => {
        const key = e.key;
        if (['1', '2', '3', '4'].includes(key)) {
            const index = parseInt(key) - 1;
            const buttons = optionsEl.querySelectorAll('.option');
            if (buttons[index]) buttons[index].click();
        }
    });

    loadQuestion();
</script>
@endsection
