<?php
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrolmentController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\LectureVideoController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZoomMettingController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;


Route::post('/user/register', [UserController::class, 'registerUser'])->name('register');
Route::post('/user/login', [UserController::class, 'loginUser'])->name('login');
Route::post('/user/logout', [UserController::class, 'logoutuser'])->name('logout');
Route::post('/contact', [UserController::class, 'contactCreate'])->name('contact.form');

Route::get('/user/register', [UserController::class, 'showRegister'])->name('register.form');
// Route::post('/register/user', [UserController::class, 'onRegister'])->name('register');
Route::get('/user/login', [UserController::class, 'showLogin'])->name('login.form');
#userside

Route::get('/', [UserController::class, 'index'])->name('Home');
Route::get('/course/detail/{id}', [UserController::class, 'showCourseDetail'])->name('course.details');

Route::get('/checkout/{id}', [CheckoutController::class, 'index'])->name('checkout');

Route::get('/about', [UserController::class, 'showAbout'])->name('About');



Route::middleware(['auth', 'user'])->group(function () {

    // Route::post('/login/user', [UserController::class, 'onLogin'])->name('login');
    Route::post('/payment/{id}', [CheckoutController::class, 'payment'])->name('payment');

});

//use admin.dashboard and parent.dashboard for route name for parent and admin
#Adminside
Route::middleware(['auth', 'admin'])->group(function () {

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
});


// use student.dashboard and parent.dashboard instructor.dashboard oter wise it will give error due to its used in index.js
// Route::get('/admin/dashboard/dummy', [UserController::class, 'showAdmin'])->name('student.dashboard');
Route::get('/admin/dashboard/dummy/parent', [UserController::class, 'showAdmin'])->name('parent.dashboard');
Route::middleware(['auth', 'instructor'])->group(function () {

    #instructorside
    Route::get('/instructor/dashboard', [InstructorController::class, 'showInstructor'])->name('instructor.dashboard');
    Route::get('/instructor/mycourses', [CourseController::class, 'myCourses'])->name('instructor.mycourses');
    Route::get('/instructor/mycourses/content/{id}', [LectureVideoController::class, 'myCoursesContent'])->name('instructor.mycourses.content');
    Route::get('/mycourses/videos/adad', [LectureVideoController::class, 'addVideo'])->name('mycourses.videos.add');
    Route::get('/mycourses/videos/manage', [LectureVideoController::class, 'manageVideo'])->name('mycourses.videos.manage');
    Route::get('/mycourses/assignments/add', [AssignmentController::class, 'addAssignment'])->name('mycourses.assignment.add');
    Route::get('/mycourses/assignments/manage', [AssignmentController::class, 'manageAssignment'])->name('mycourses.assignment.manage');
    Route::get('/mycourses/quizes/add', [QuizController::class, 'addQuizes'])->name('mycourses.quizes.add');
    Route::get('/mycourses/quizes/manage', [QuizController::class, 'manageQuizes'])->name('mycourses.quiz.manage');
    Route::get('/calculate-grade/{student_id}/{course_id}', [EnrolmentController::class, 'calculateGrade']);
    Route::get('/mycourses/enrolments/manage', [EnrolmentController::class, 'manageCourseEnrollments'])->name('mycourses.enrolments.manage');
    Route::get('/student/progress/{id}', [StudentController::class, 'studentProgress'])->name('student.progress');

    Route::get('/add/live/class', [ZoomMettingController::class, 'zoomMeeting'])->name('meetings.store');
    Route::post('/create/live/class', [ZoomMettingController::class, 'createMetting'])->name('meetings.create');
    Route::get('/live/class/list', [ZoomMettingController::class, 'listLiveVideo'])->name('meetings.show');
    Route::delete('/live-class/{id}', [ZoomMettingController::class, 'destroy'])
        ->name('delete.class.live');

    Route::get('/instructor/chat/{id}', [StudentController::class, 'instructorChat'])->name('instructor.chat');
    // Route::get('/instructor/chat/courses', [CourseController::class, 'myCoursesChat'])->name('instructor.chat.courses');

    Route::get('/all', [CourseController::class, 'myCoursesChat'])->name('instructor.chat.courses');





    Route::post('/mycourses/assignments/create', [AssignmentController::class, 'createAssignment'])->name('mycourses.assignment.create');

    Route::post('/mycourses/videos/create', [LectureVideoController::class, 'uploadVideo'])->name('mycourses.videos.create');
    Route::delete('/course/video/delete/{id}', [LectureVideoController::class, 'deleteCourseVideo'])->name('course.video.delete');
    Route::post('/course/video/update/{id}', [LectureVideoController::class, 'updateCourseVideo'])->name('course.video.update');



    Route::delete('/assignment/delete/{id}', [AssignmentController::class, 'deleteAssignment'])->name('assignment.delete');
    Route::post('/assignment/update/{id}', [AssignmentController::class, 'updateAssignment'])->name('assignment.update');

    Route::post('/quiz/create', [QuizController::class, 'createQuiz'])->name('quiz.create');
    Route::delete('/course/quiz/delete/{id}', [QuizController::class, 'deleteQuiz'])->name('quiz.delete');
    Route::get('/assign/numbers', [InstructorController::class, 'assignTask'])->name('assign.numbers');
    Route::get('/quiz/numbers', [InstructorController::class, 'quizTask'])->name('quiz.numbers');

    Route::post('/quiz/marks/upload', [InstructorController::class, 'storeQuizMark'])->name('quiz.store.mark');


});



#studentDashboard
Route::get('/student/dashboard', [StudentController::class, 'showStudent'])->name('student.dashboard');
Route::get('/student/mycourses', [CourseController::class, 'myCoursesStudent'])->name('student.mycourses');
Route::get('/student/mycourses/content/{id}', [LectureVideoController::class, 'myCoursesContentStudent'])->name('student.mycourses.content');
Route::get('/student/mycourses/videos/{id?}', [LectureVideoController::class, 'sawVideo'])->name('student.mycourses.videos');
Route::get('/student/mycourses/assignments/{id?}', [AssignmentController::class, 'studentAssignments'])->name('student.mycourses.assignments');
Route::get('/student/mycourses/quizes/{id?}', [QuizController::class, 'studentQuizes'])->name('student.mycourses.quizes');
Route::get('/student/mycourses/attempt/quizes/{id?}', [QuizController::class, 'attemptQuizes'])->name('student.mycourses.attempt.quizes');

Route::post('/student/assignments/upload', [AssignmentController::class, 'studentSolveAssignments'])->name('student.assignment.upload');
Route::post('/student/quiz/upload', [QuizController::class, 'studentSolveQuiz'])->name('student.submit.mcq');
Route::get('/chat/{id}', [StudentController::class, 'studentChat'])->name('student.chat');
// Route::post('/chat/store', [StudentController::class, 'storeChat'])->name('chat.store');

Route::get('/live-classes/{id}', [ZoomMettingController::class, 'index'])->name('live.class');
Route::post('/attendance/mark/{id}', [ZoomMettingController::class, 'markAttendance']);
// Route::get('/student/progress', [StudentController::class, 'myProgress'])->name('student.progress');
#instructor just to be build logic
// Route::get('/instructor/chat', [InstructorController::class, 'instructorChat'])->name('instructor.chat');
Route::controller(StripePaymentController::class)->group(function () {
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});


Route::get('/view/{is}', [InstructorController::class, 'viewAssignment'])->name('submiited.assignment.pdf');
Route::get('/view/quiz/{is}', [InstructorController::class, 'viewQuiz'])->name('submiited.quiz.pdf');

Route::post('/store/assignment/mark', [InstructorController::class, 'storeAssignmentMark'])->name('assignment.store.mark');
Route::post('/store/quiz/mcq/mark', [InstructorController::class, 'storeQuizMcqMark'])->name('mcq.mark');

Route::post('/chat/store', [StudentController::class, 'storeChat'])->name('chat.store');

