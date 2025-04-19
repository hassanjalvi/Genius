@extends('Student.layots.main')
@section('title', 'Video Lectures')

@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <h2 class="mb-4 text-center" style="margin-left: 100px">🎓 My Course Lectures</h2>
    <hr>
    <div class="row row-cols-1 row-cols-md-3 g-4" style="margin-left:200px">

        <div class="col">
            <div class="card h-100 shadow-sm">
                <video class="card-img-top" controls style="height: 200px; object-fit: cover;">
                    <source src="https://sample-videos.com/video123/mp4/720/big_buck_bunny_720p_1mb.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="card-body bg-dark text-white">
                    <h5 class="card-title">Intro to HTML</h5>
                    <p class="card-text">Learn the basics of web structure with HTML5 elements.</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm">
                <video class="card-img-top" controls style="height: 200px; object-fit: cover;">
                    <source src="https://filesamples.com/samples/video/mp4/sample_640x360.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="card-body bg-dark text-white">
                    <h5 class="card-title">CSS Flexbox Guide</h5>
                    <p class="card-text">Master layout control using Flexbox in CSS.</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm">
                <video class="card-img-top" controls style="height: 200px; object-fit: cover;">
                    <source src="https://sample-videos.com/video123/mp4/720/big_buck_bunny_720p_1mb.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="card-body bg-dark text-white">
                    <h5 class="card-title">JavaScript Basics</h5>
                    <p class="card-text">Introduction to JavaScript syntax and DOM manipulation.</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm">
                <video class="card-img-top" controls style="height: 200px; object-fit: cover;">
                    <source src="https://filesamples.com/samples/video/mp4/sample_960x400.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="card-body bg-dark text-white">
                    <h5 class="card-title">Laravel Basics</h5>
                    <p class="card-text">Setup, routes, and controllers in Laravel framework.</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm">
                <video class="card-img-top" controls style="height: 200px; object-fit: cover;">
                    <source src="https://filesamples.com/samples/video/mp4/sample_960x400.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="card-body bg-dark text-white">
                    <h5 class="card-title">Laravel Blade Templating</h5>
                    <p class="card-text">Learn how to create reusable templates in Laravel using Blade.</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm">
                <video class="card-img-top" controls style="height: 200px; object-fit: cover;">
                    <source src="https://sample-videos.com/video123/mp4/720/big_buck_bunny_720p_1mb.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="card-body bg-dark text-white">
                    <h5 class="card-title">Eloquent ORM</h5>
                    <p class="card-text">Use Laravel Eloquent to interact with your database effortlessly.</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm">
                <video class="card-img-top" controls style="height: 200px; object-fit: cover;">
                    <source src="https://filesamples.com/samples/video/mp4/sample_640x360.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="card-body bg-dark text-white">
                    <h5 class="card-title">PHP Functions</h5>
                    <p class="card-text">Understand how to create and use functions in PHP.</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm">
                <video class="card-img-top" controls style="height: 200px; object-fit: cover;">
                    <source src="https://sample-videos.com/video123/mp4/720/big_buck_bunny_720p_1mb.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="card-body bg-dark text-white">
                    <h5 class="card-title">API Integration</h5>
                    <p class="card-text">Connect your Laravel app with external APIs and fetch data.</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm">
                <video class="card-img-top" controls style="height: 200px; object-fit: cover;">
                    <source src="https://filesamples.com/samples/video/mp4/sample_960x400.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="card-body bg-dark text-white">
                    <h5 class="card-title">MySQL with Laravel</h5>
                    <p class="card-text">Learn how to manage MySQL databases within Laravel projects.</p>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
