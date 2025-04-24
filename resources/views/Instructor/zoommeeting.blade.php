@extends('Instructor.layots.main')

@section('title', 'Manage Assignments & Quizzes')

@section('main-container')

<link rel="stylesheet" href="{{ asset('Admin/css/management.css') }}">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background-color: #f8f9fa;
    }

    .meeting-form {
        max-width: 600px;
        margin: 50px auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .meeting-form h3 {
        margin-bottom: 25px;
        font-weight: 600;
        text-align: center;
        color: #343a40;
    }

    .form-label {
        font-weight: 500;
    }

    input:focus,
    select:focus {
        box-shadow: 0 0 0 0.2rem rgba(13,110,253,.25);
        border-color: #0d6efd;
    }

    .btn-primary {
        background-color: #0d6efd;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0b5ed7;
    }
</style>



<main>
    <section id="manage-videos" style="margin-left: 100px">

        <form action="{{ route('meetings.create') }}" method="POST" class="meeting-form">
            @csrf

            <h3>📅 Schedule Zoom Meeting</h3>

            {{-- Zoom Link --}}
            <div class="mb-3">
                <label for="zoom_link" class="form-label">Zoom Meeting Link</label>
                <input type="url" name="zoom_link" id="zoom_link" class="form-control" placeholder="https://zoom.us/j/your-meeting-id" required>
            </div>

            {{-- Meeting Time --}}
            <div class="mb-3">
                <label for="meeting_time" class="form-label">Meeting Time</label>
                <input type="datetime-local" name="meeting_time" id="meeting_time" class="form-control" required>
            </div>

            {{-- Select Course --}}
            <div class="mb-3">
                <label for="course_id" class="form-label">Select Course</label>
                <select name="course_id" id="course_id" class="form-select" required>
                    <option value="" disabled selected>-- Choose a Course --</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id ?? ""}}">{{ $course->name ?? ""}}</option>
                    @endforeach
                </select>
            </div>

            {{-- Submit Button --}}
            <button type="submit" class="btn btn-primary w-100">💾 Create Meeting</button>
        </form>

    </section>



    @endsection
