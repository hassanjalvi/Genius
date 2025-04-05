<?php
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrolmentController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/user/register', [UserController::class, 'registerUser'])->name('register');
Route::post('/user/login', [UserController::class, 'loginUser'])->name('login');
Route::post('/user/logout', [UserController::class, 'logoutuser'])->name('logout');

#userside
Route::get('/user/register', [UserController::class, 'showRegister'])->name('register.form');
// Route::post('/register/user', [UserController::class, 'onRegister'])->name('register');
Route::get('/user/login', [UserController::class, 'showLogin'])->name('login.form');
// Route::post('/login/user', [UserController::class, 'onLogin'])->name('login');
Route::get('/', [UserController::class, 'index'])->name('Home');
Route::get('/about', [UserController::class, 'showAbout'])->name('About');
Route::get('/check-out', [PaymentController::class, 'showCheckout'])->name('Checkout');

//use admin.dashboard and parent.dashboard for route name for parent and admin
#Adminside
Route::get('/admin/dashboard', [UserController::class, 'showAdmin'])->name('admin.dashboard');
Route::get('/students/manage', [StudentController::class, 'manageStudents'])->name('students.manage');
Route::get('/instructors/add', [InstructorController::class, 'addInstructors'])->name('instructors.add');
Route::get('/instructors/manage', [InstructorController::class, 'manageInstructors'])->name('instructors.manage');
Route::get('/courses/add', [CourseController::class, 'addCourses'])->name('courses.add');
Route::get('/courses/manage', [CourseController::class, 'manageCourses'])->name('courses.manage');
Route::get('/enrolments/manage', [EnrolmentController::class, 'manageEnrollments'])->name('enrolments.manage');
Route::get('/payments/manage', [PaymentController::class, 'managePayments'])->name('payments.manage');
Route::get('/setup/fees', [CourseController::class, 'setupFees'])->name('setup.fees');

Route::post('course/setup/fees/create', [CourseController::class, 'createSetupFeeForCourse'])->name('setup.fees.create');


Route::delete('/student/delete/{id}', [StudentController::class, 'studentDelete'])->name('student.delete');
Route::put('/student/update/{id}', [StudentController::class, 'studentUpdate'])->name('student.update');

Route::post('/instructor/create', [InstructorController::class, 'createInstructors'])->name('instructor.create');
Route::delete('/instructor/delete/{id}', [InstructorController::class, 'deleteInstructor'])->name('instructor.delete');
Route::put('/instructor/update/{id}', [InstructorController::class, 'updateInstructor'])->name('instructor.update');

Route::post('/course/create', [CourseController::class, 'createcourse'])->name('course.create');
Route::delete('/course/delete/{id}', [CourseController::class, 'deletecourse'])->name('course.delete');
Route::put('/course/update/{id}', [CourseController::class, 'updatecourse'])->name('course.update');

Route::delete('/enrollment/delete/{id}', [EnrolmentController::class, 'deleteEnrollmant'])->name('enrollment.delete');
Route::put('/enrollment/update/{id}', [EnrolmentController::class, 'updateEnrollmant'])->name('enrollment.update');

Route::delete('/payment/delete/{id}', [PaymentController::class, 'deletePayment'])->name('payment.delete');
Route::put('/payment/update/{id}', [PaymentController::class, 'updatePayment'])->name('payment.update');

// use student.dashboard and parent.dashboard instructor.dashboard oter wise it will give error due to its used in index.js
Route::get('/admin/dashboard/dummy', [UserController::class, 'showAdmin'])->name('student.dashboard');
Route::get('/admin/dashboard/dummy/parent', [UserController::class, 'showAdmin'])->name('parent.dashboard');
#instructorside
Route::get('/instructor/dashboard', [InstructorController::class, 'showInstructor'])->name('instructor.dashboard');
Route::get('/instructor/mycourses', [CourseController::class, 'myCourses'])->name('instructor.mycourses');
Route::get('/instructor/mycourses/content', [CourseController::class, 'myCoursesContent'])->name('instructor.mycourses.content');
Route::get('/mycourses/videos/add', [CourseController::class, 'addVideo'])->name('mycourses.videos.add');
Route::get('/mycourses/videos/manage', [CourseController::class, 'manageVideo'])->name('mycourses.videos.manage');
Route::get('/mycourses/assignments/add', [AssignmentController::class, 'addAssignment'])->name('mycourses.assignment.add');
Route::get('/mycourses/assignments/manage', [AssignmentController::class, 'manageAssignment'])->name('mycourses.assignment.manage');
Route::get('/student/progress', [StudentController::class, 'studentProgress'])->name('student.progress');
