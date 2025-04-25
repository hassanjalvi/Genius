@extends('Instructor.layots.main')

@section('title', 'Manage Assignments & Quizzes')

@section('main-container')
<link rel="stylesheet" href="{{ asset('Admin/css/management.css') }}">

<main>
    <section id="manage-videos" style="margin-left: 100px">
        <div class="container">
            <h2>Assignment</h2>
            {{-- <button class="btn btn-success">Add New Video</button> --}}
            <br><br>

            <div class="videos-list">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student Name</th>
                            <th>Course Name</th>
                            <th>Assignment No</th>
                            <th>Assignment Title</th>
                            <th>Assignment Total Marks</th>
                            <th>Assignment Obtain Marks</th>


                            <th>Assignmnet Submission</th>

                        </tr>
                    </thead>
                    <tbody>
                        <!-- Video Row 1 -->
                        {{-- @foreach ($stu_assignment as $stu)
                        @foreach ($stu->enrolmnets as $en )
                        {{-- @foreach ($en->course as $cou ) --}}
                        {{-- @foreach ($en->course->assignment  as $ass )
                        @foreach ($ass->assignmentSubmission as $sub ) --}}






                        {{-- @foreach ($en->assignment as $ass ) --}}




                        {{-- <tr>
                            <td>{{$loop->iteration}}</td>

                            <td>{{$stu->name}}</td>
                            <td>{{$en->course->name ?? ''}}</td> --}}

                            {{-- @if ($cou->assignment && $cou->assignment->count() > 0) --}}
                            {{-- @foreach ($cou->assignment as $ass) --}}
                            {{-- <td>{{ $ass->number ?? "no assignment uploaded" }}</td>
                                <td>{{ $ass->assignment_title ?? "no assignment uploaded" }}</td>
                                <td>{{ $ass->total_mark ?? "" }}</td> --}}

                            {{-- @endforeach --}}
                        {{-- @else
                            <td>No assignments available</td>
                        @endif --}}

                        {{-- @if ($sub)
                        <td><a href="{{ $sub->file }}">View</a></td>
                        @else
                        <td><a href="{{ $sub->file }}">Pending</a></td>

                        @endif


                        </tr> --}}

                        {{-- @endforeach --}}
                        {{-- @endforeach --}}
                        {{-- @endforeach --}}
                        {{-- @endforeach
                        @endforeach
                        @endforeach  --}}

                        @foreach ($stu_assignment as $stu)
    @foreach ($stu->enrolmnets as $en)
        @foreach ($en->course->assignment as $ass)
            @php
                // Find the submission of this student for this assignment
                $submission = $ass->assignmentSubmission->where('student_id', $stu->id)->first();
            @endphp

            <tr>
                <td>{{ $loop->iteration ?? "" }}</td>
                <td>{{ $stu->name }}</td>
                <td>{{ $en->course->name ?? '' }}</td>
                <td>{{ $ass->number ?? "---" }}</td>
                <td>{{ $ass->assignment_title ?? "---" }}</td>
                <td>{{ $ass->total_mark ?? "" }}</td>




                <td>{{ $submission->marks ?? "pending" }}</td>
                @if ($submission)
                    <td><a href="{{ $submission->file ?? ""  }}">View</a></td>
                @else
                    <td>Pending</td>
                @endif
            </tr>
        @endforeach
    @endforeach
@endforeach


                        <!-- Video Row 2 -->


                    </tbody>
                </table>
            </div>
        </div>
    </section>











    <section id="manage-videos" style="margin-left: 100px">
        <div class="container">
            <h2>Quiz</h2>
            {{-- <button class="btn btn-success">Add New Video</button> --}}
            <br><br>

            <div class="videos-list" style="overflow-x: auto;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student Name</th>
                            <th>Course Name</th>
                            <th>Quiz No</th>
                            <th>Quiz Title</th>
                            <th>Quiz Type</th>

                            <th>Quiz Total Marks</th>
                            <th>Quiz Obtain Marks</th>


                            <th>Quiz Submission</th>

                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($stu_quiz as $stu)
    @foreach ($stu->enrolmnets as $en)
        @foreach ($en->course->courseQuiz as $ass)
            @php
                // Find the submission of this student for this assignment
                $submission = $ass->quizSubmission->where('student_id', $stu->id)->first();
            @endphp

            <tr>
                <td>{{ $loop->iteration ?? "" }}</td>
                <td>{{ $stu->name }}</td>
                <td>{{ $en->course->name ?? '' }}</td>
                <td>{{ $ass->number ?? "---" }}</td>
                <td>{{ $ass->title ?? "---" }}</td>
                <td>{{ $ass->type ?? "---" }}</td>

                <td>{{ $ass->total_mark ?? "" }}</td>




                <td>{{ $submission->marks ?? "pending" }}</td>

                @if ( $ass->type === 'pdf')


                @if ($submission)
                    <td><a href="{{ $submission->file ?? ""  }}">View</a></td>
                @else
                    <td>Pending</td>
                @endif

                @else
                <td>---</td>
                @endif
            </tr>
        @endforeach
    @endforeach
@endforeach


                        <!-- Video Row 2 -->


                    </tbody>
                </table>
            </div>
        </div>
    </section>









    <section id="manage-videos" style="margin-left: 100px">
        <div class="container">
            <h2>Attendance</h2>
            {{-- <button class="btn btn-success">Add New Video</button> --}}
            <br><br>

            <div class="videos-list" style="overflow-x: auto;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student Name</th>
                            <th>Course Name</th>
                            <th>Class Link</th>
                            <th>Class Time</th>
                            <th>Attendance</th>

                            {{-- <th>Assignment Total Marks</th>
                            <th>Assignment Obtain Marks</th> --}}


                            {{-- <th>Assignmnet Submission</th> --}}

                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($stu_attendance as $stu)
    @foreach ($stu->enrolmnets as $en)
        @foreach ($en->course->liveClass as $ass)
            @php
                // Find the submission of this student for this assignment
                $submission = $ass->attendances->where('student_id', $stu->id)->first();
            @endphp

            <tr>
                <td>{{ $loop->iteration ?? "" }}</td>
                <td>{{ $stu->name }}</td>
                <td>{{ $en->course->name ?? '' }}</td>
                <td>{{ $ass->zoom_link ?? "---" }}</td>
                <td>{{ $ass->meeting_time ?? "---" }}</td>
                {{-- <td>{{ $ass->type ?? "---" }}</td> --}}

                {{-- <td>{{ $ass->total_mark ?? "" }}</td> --}}




                {{-- <td>{{ $submission->marks ?? "pending" }}</td> --}}




                @if ($submission)
                    <td>Present</td>
                @else
                    <td>Absend</td>
                @endif


            </tr>
        @endforeach
    @endforeach
@endforeach


                        <!-- Video Row 2 -->


                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>

<script>
    function toggleEditForm(videoId) {
        var editForm = document.getElementById('edit-form-' + videoId);
        editForm.style.display = (editForm.style.display === 'none' || editForm.style.display === '') ? 'table-row' : 'none';
    }
</script>

@endsection
