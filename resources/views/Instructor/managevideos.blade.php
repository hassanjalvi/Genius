@extends('Instructor.layots.main')

@section('title', 'Manage Videos')

@section('main-container')
<link rel="stylesheet" href="{{ asset('Admin/css/management.css') }}">

<main>
    <section id="manage-videos" style="margin-left: 100px">
        <div class="container">
            <h2>Manage Videos</h2>
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

            <button class="btn btn-success" onclick="window.location='{{ route('mycourses.videos.add') }}'">Add New Video</button>
            <br><br>

            <div class="videos-list">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Video</th>
                            <th>Video Title</th>
                            <th>Course</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Video Row 1 -->
                        @foreach ($courseVideo as $cou )
                        @foreach ($cou->courseVideo as $video )




                        <tr>
                            <td>{{$video->id}}</td>
                            <td>
                                <video width="200" controls>
                                    <source src="{{ $video->file ?? "" }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </td>
                            <td>{{$video->title ?? ""}}</td>
                            <td>{{$cou->name ?? ""}}</td>
                            <td>
                                <button onclick="toggleEditForm({{ $video->id }})" class="btn btn-primary edit-btn" ><i class="fas fa-edit"></i></button>

                                <div style="display: inline-block;">

                                    <form action="{{ route('course.video.delete', $video->id) }}"  method="POST" onsubmit="return confirm('Are you sure you want to delete this vidoe lecture?');">
                                        @csrf
                                        @method('DELETE')
                                <button class="btn btn-danger delete-btn" ><i class="fas fa-trash"></i></button>
                                    </form>
                            </div>
                            </td>
                        </tr>
                        <tr id="edit-form-{{ $video->id }}" class="edit-form" style="display: none;">
                            <td colspan="6">
                                <form action="{{ route('course.video.update', $video->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Video Title:</label>
                                        <input type="text" class="form-control" name="title" value="{{$video->title ?? ""}}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Video File (leave blank to keep existing):</label>
                                        <input type="file" class="form-control" name="video_file">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Video</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endforeach
                        <!-- Video Row 2 -->


                        <!-- Add more static rows as needed -->

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
