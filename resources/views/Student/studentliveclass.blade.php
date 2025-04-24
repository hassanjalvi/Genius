@extends('Student.layots.main')

@section('title', 'Live Classes')

@section('main-container')
<meta name="csrf-token" content="{{ csrf_token() }}">


<link rel="stylesheet" href="{{ asset('Admin/css/management.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <h3 class="mb-4">Live Classes</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Course</th>
                <th>Instructor</th>
                <th>Meeting Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($liveClasses as $class)
            <tr>
                <td>{{ $class->course->name }}</td>
                <td>{{ $class->instructor->name }}</td>
                <td>{{ \Carbon\Carbon::parse($class->meeting_time)->format('d M Y, h:i A') }}</td>
                <td>
                    <button class="btn btn-primary join-class"
                            data-zoom-link="{{ $class->zoom_link }}"
                            data-meeting-id="{{ $class->id }}"
                            data-bs-toggle="modal"
                            data-bs-target="#qrModal">
                        Join & Scan QR
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<!-- QR Modal -->
<div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="qrModalLabel">Scan QR to Join Zoom</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div id="qrcode" class="mb-3"></div>
                <button id="zoomLinkBtn" class="btn btn-success" target="_blank">
                    Mark Attendance
                </button>
                <div id="attendanceMessage" class="mt-2"></div>
            </div>
        </div>
    </div>
</div>

<!-- Required JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.1/build/qrcode.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const qrModal = document.getElementById('qrModal');
    let currentMeetingId = null;

    qrModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const zoomLink = button.getAttribute('data-zoom-link');
        currentMeetingId = button.getAttribute('data-meeting-id');

        // Set the Zoom link button
        const zoomLinkBtn = document.getElementById('zoomLinkBtn');
        zoomLinkBtn.href = zoomLink;
        zoomLinkBtn.innerHTML = 'Mark Attendance'; // Reset button text

        // Clear any previous messages
        document.getElementById('attendanceMessage').innerHTML = '';

        // Generate QR Code
        const qrElement = document.getElementById('qrcode');
        qrElement.innerHTML = '';

        QRCode.toCanvas(zoomLink, { width: 200 }, function(error, canvas) {
            if (error) {
                console.error(error);
                qrElement.innerHTML = '<p class="text-danger">Failed to generate QR code</p>';
                return;
            }
            qrElement.appendChild(canvas);
        });
    });

    // Mark attendance when Zoom link is clicked
    document.getElementById('zoomLinkBtn').addEventListener('click', function(e) {
        if (currentMeetingId) {
            // Change button text to show loading state
            this.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Marking Attendance...';

            // Mark attendance via AJAX
            axios.post(`/attendance/mark/${currentMeetingId}`)
                .then(response => {
                    document.getElementById('attendanceMessage').innerHTML =
                        `<div class="alert alert-success">${response.data.message}</div>`;
                })
                .catch(error => {
                    let message = 'Error marking attendance';
                    if (error.response && error.response.data && error.response.data.message) {
                        message = error.response.data.message;
                    }
                    document.getElementById('attendanceMessage').innerHTML =
                        `<div class="alert alert-danger">${message}</div>`;
                })
                .finally(() => {
                    // Reset button text after request completes
                    this.innerHTML = 'Mark Attendance';
                });
        }
    });

    qrModal.addEventListener('hidden.bs.modal', function() {
        document.getElementById('qrcode').innerHTML = '';
        document.getElementById('attendanceMessage').innerHTML = '';
        currentMeetingId = null;
    });
});
</script>

@endsection
