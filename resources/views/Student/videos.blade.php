@extends('Student.layots.main')
@section('title', 'Video Lectures')

@section('main-container')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <h2 class="mb-4 text-center">🎓 My Course Lectures</h2>
    <hr>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">

        @foreach ($video as $vid)
            <div class="col">
                <div class="card h-100 shadow-lg border-0 rounded-4 overflow-hidden">
                    <div class="position-relative" style="height: 220px;">
                        <video class="w-100 h-100" style="object-fit: cover; border-bottom: 3px solid #0d6efd;" controls>
                            <source src="{{ $vid->file }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <span class="badge bg-primary position-absolute top-0 start-0 m-2 px-3 py-2 rounded-pill">
                            Video
                        </span>
                    </div>
                    <div class="card-body bg-dark text-white text-center">
                        <h5 class="card-title mb-2" style="font-weight: 600;">{{ $vid->title }}</h5>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>


@endsection
