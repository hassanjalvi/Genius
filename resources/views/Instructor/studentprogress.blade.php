@extends('Admin.layots.main')

@section('title', 'Manage Videos & Student Progress')

@section('main-container')
<link rel="stylesheet" href="{{ asset('Admin/css/management.css') }}">

<main>
    <section id="manage-videos" style="margin-left: 100px">
        <div class="container">
            <h2>Manage Videos & Track Student Progress</h2>
            <button class="btn btn-success">Add New Video</button>
            <br><br>

            <div class="videos-list">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Video</th>
                            <th>Video Title</th>
                            <th>Course</th>
                            <th>Student Progress</th>
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
                                <!-- Example: Progress bar for student watching the video -->
                                <div class="progress">
                                    <div class="progress-bar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                                </div>
                                <!-- Example: Assignment submitted status -->
                                <p>Status: <span class="text-success">Submitted</span></p>
                            </td>
                            <td>
                                <button class="btn btn-primary" onclick="toggleEditForm(1)">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="#" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this video?');">
                                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
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
                                <div class="progress">
                                    <div class="progress-bar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
                                </div>
                                <p>Status: <span class="text-warning">In Progress</span></p>
                            </td>
                            <td>
                                <button class="btn btn-primary" onclick="toggleEditForm(2)">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="#" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this video?');">
                                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>

                        <!-- Video Row 3 -->
                        <tr>
                            <td>3</td>
                            <td>
                                <video width="200" controls>
                                    <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </td>
                            <td>Laravel Routing Deep Dive</td>
                            <td>Course 3</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40%</div>
                                </div>
                                <p>Status: <span class="text-danger">Not Submitted</span></p>
                            </td>
                            <td>
                                <button class="btn btn-primary" onclick="toggleEditForm(3)">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <form action="#" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this video?');">
                                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
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
    function toggleEditForm(videoId) {
        var editForm = document.getElementById('edit-form-' + videoId);
        editForm.style.display = (editForm.style.display === 'none' || editForm.style.display === '') ? 'table-row' : 'none';
    }
</script>

@endsection
