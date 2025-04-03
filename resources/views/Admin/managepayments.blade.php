@extends('Admin.layots.main')

@section('title', 'Manage Payments & Transactions')

@section('main-container')
<link rel="stylesheet" href="{{asset('Admin/css/management.css')}}">
<main>
   
    
    
    <section id="manage-payments" style="margin-left: 100px">
       
        <div class="container">
            <h2>Manage Payments & Transactions</h2>

            <!-- Filter Form -->
            <div class="row mb-3">
                <div class="col-lg-12 text-center">
                    <input type="date" id="startDate" class="form-control d-inline w-25 m-2 p-3 fs-4" placeholder="Start Date">
                    <input type="date" id="endDate" class="form-control d-inline w-25 m-2 p-3 fs-4" placeholder="End Date">
                    
                    <select id="courseFilter" class="form-control d-inline w-25 m-2 p-3 fs-4">
                        <option value="">Select Course</option>
                        <option value="course1">Course 1</option>
                        <option value="course2">Course 2</option>
                        <option value="course3">Course 3</option>
                    </select>
            
                    <select id="userFilter" class="form-control d-inline w-25 m-2 p-3 fs-4">
                        <option value="">Select User</option>
                        <option value="user1">User 1</option>
                        <option value="user2">User 2</option>
                        <option value="user3">User 3</option>
                    </select>
            
                    <button id="filterButton" class="btn btn-primary m-2 p-3 fs-4">Filter</button>
                </div>
            </div>
            
            

            <!-- Payments Table -->
            <div class="payments-list">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Course</th>
                            <th>Payment Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example payment entry; Populate this with real data dynamically -->
                        <tr>
                            <td>John Doe</td>
                            <td>Course 1</td>
                            <td>2025-04-01</td>
                            <td>$100</td>
                            <td>Completed</td>
                            <td>
                                <button class="btn btn-primary edit-btn" onclick="toggleEditForm(1)"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger delete-btn" onclick="deletePayment(1)"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>

                        <tr id="edit-form-1" class="edit-form" style="display: none;">
                            <td colspan="6">
                                <form action="{{ url('/update-payment') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="payment_id" value="1">
                                    <div class="mb-3">
                                        <label class="form-label">Student Name:</label>
                                        <input type="text" class="form-control" name="student_name" value="John Doe" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Course:</label>
                                        <input type="text" class="form-control" name="course" value="Course 1" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Payment Date:</label>
                                        <input type="date" class="form-control" name="payment_date" value="2025-04-01" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Amount:</label>
                                        <input type="number" class="form-control" name="amount" value="100" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Status:</label>
                                        <select class="form-control" name="status">
                                            <option value="Completed" selected>Completed</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Failed">Failed</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Payment</button>
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
    function toggleEditForm(paymentId) {
        var editForm = document.getElementById('edit-form-' + paymentId);
        editForm.style.display = (editForm.style.display === 'none' || editForm.style.display === '') ? 'table-row' : 'none';
    }

    function deletePayment(paymentId) {
        if (confirm('Are you sure you want to delete this payment record?')) {
            // Here you should send an AJAX request or form submission to delete the payment
            // Example: window.location.href = "/delete-payment/" + paymentId;
        }
    }
</script>

@endsection
