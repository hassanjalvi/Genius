@extends('Instructor.layots.main')

@section('title', 'Manage Videos')

@section('main-container')
<link rel="stylesheet" href="{{ asset('Admin/css/management.css') }}">

<main>
    <section id="manage-videos" style="margin-left: 100px">
        <div class="container">
            <h2>Manage Videos</h2>
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
                        <tr>
                            <td>1</td>
                            <td>
                                <video width="200" controls>
                                    <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </td>
                            <td>Intro to Laravel</td>
                            <td>Course 1</td>
                            <td>
                                <button class="btn btn-primary" onclick="toggleEditForm(1)">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="#" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this video?');">
                                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <tr id="edit-form-1" class="edit-form" style="display: none;">
                            <td colspan="6">
                                <form action="#" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label class="form-label">Video Title:</label>
                                        <input type="text" class="form-control" name="title" value="Intro to Laravel" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Video File (leave blank to keep existing):</label>
                                        <input type="file" class="form-control" name="video_file">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Course:</label>
                                        <select class="form-control" name="course_id" required>
                                            <option value="1" selected>Course 1</option>
                                            <option value="2">Course 2</option>
                                            <option value="3">Course 3</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Status:</label>
                                        <select name="status" class="form-control">
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Video</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Video Row 2 -->
                        <tr>
                            <td>2</td>
                            <td>
                                <video width="200" controls>
                                    <source src="https://www.w3schools.com/html/movie.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </td>
                            <td>Understanding Blade Templates</td>
                            <td>Course 2</td>
                            <td>
                                <button class="btn btn-primary" onclick="toggleEditForm(2)">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="#" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this video?');">
                                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <tr id="edit-form-2" class="edit-form" style="display: none;">
                            <td colspan="6">
                                <form action="#" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label class="form-label">Video Title:</label>
                                        <input type="text" class="form-control" name="title" value="Understanding Blade Templates" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Video File (leave blank to keep existing):</label>
                                        <input type="file" class="form-control" name="video_file">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Course:</label>
                                        <select class="form-control" name="course_id" required>
                                            <option value="1">Course 1</option>
                                            <option value="2" selected>Course 2</option>
                                            <option value="3">Course 3</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Status:</label>
                                        <select name="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0" selected>Inactive</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Video</button>
                                </form>
                            </td>
                        </tr>

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
