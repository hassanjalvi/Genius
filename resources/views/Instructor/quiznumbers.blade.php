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

        <h2 class="text-center mb-4" style="margin-left: 230px">Quiz Numbers</h2>

      {{-- Success Message --}}
@if(session('success'))
<div id="toast-success" class="toast-message success">
    {{ session('success') }}
</div>
@endif

{{-- Error Message --}}
@if($errors->any())
<div id="toast-error" class="toast-message error">
    {{ $errors->first() }}
</div>
@endif

<style>
.toast-message {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #4CAF50; /* default green */
    color: white;
    padding: 15px 25px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
    z-index: 9999;
    font-weight: bold;
    animation: fadeout 1s ease-in-out 9s forwards;
}
.toast-message.error {
    background-color: #f44336; /* red color for errors */
}
.toast-message.success {
    background-color: #4CAF50; /* green color for success */
}
@keyframes fadeout {
    to { opacity: 0; transform: translateY(-20px); visibility: hidden; }
}
</style>

<script>
setTimeout(() => {
    document.getElementById('toast-success')?.remove();
    document.getElementById('toast-error')?.remove();
}, 10000);
</script>


        <!-- Filters -->


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
                        <th>Total Marks</th>
                        <th>Mark Obtained</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courseAssignmentSubmission as $data)
                    @foreach ($data->courseQuiz as  $ass)
                    @foreach ($ass->quizSubmission as $submission)
                        <tr class="assignment-row"
                            data-quiztype="{{ strtolower($data['quiz_type']) }}">
                            <td>{{ $data['id'] ?? ''}}</td>
                            <td><a href="{{route('submiited.quiz.pdf',$submission->id) }}">View</a></td>
                            <td>{{ $ass->title ?? '' }}</td>
                            <td>{{ $data->name ?? '' }}</td>
                            <td>{{ $submission->student->name ?? "" }}</td>
                            <td>{{  $ass->total_mark ?? "Marks pending" }}</td>

                            <td>{{ $submission->marks ?? "Marks pending" }}</td>
                            <td>
                                <button class="btn btn-success btn-sm upload-btn" style="background:#007bff "
                                    data-submission-id="{{ $submission->id }}"
                                    data-student="{{ $submission->student->name }}"
                                    data-title="{{ $ass->assignment_title }}"
                                    data-total_mark="{{ $ass->total_mark }}">

                                    Upload Number
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <form id="marksForm" action="{{ route('quiz.store.mark') }}" method="POST">
            @csrf
            <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="uploadModalLabel">Upload Marks</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="assignedMarks" class="form-label">Assigned Marks</label>
                                <input type="number" name="mark" class="form-control" id="assignedMarks" required>
                            </div>
                            {{-- <div class="mb-3">
                                <label for="totalMarks" class="form-label">Total Marks</label>
                                <input type="number" class="form-control" id="totalMarks" required>
                            </div> --}}
                            <input type="hidden" id="studentName">
                            <input type="hidden" id="titleName">
                            <!-- Hidden field for submission ID -->
                            <input type="hidden" name="submission_id" id="submissionId">
                            <input type="hidden" name="total_mark" id="total_mark">

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </section>
</main>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const uploadButtons = document.querySelectorAll('.upload-btn');
        const modalEl = document.getElementById('uploadModal');
        const modal = new bootstrap.Modal(modalEl);

        uploadButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                // Set the hidden fields for student name, title, and submission ID
                document.getElementById('studentName').value = btn.dataset.student;
                document.getElementById('titleName').value = btn.dataset.title;
                document.getElementById('submissionId').value = btn.dataset.submissionId; // Set submission ID here
                document.getElementById('total_mark').value = btn.dataset.total_mark; // Set submission ID here

                modal.show();
            });
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
