<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\EnrollmentCourse;
use App\Models\Enrolment;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index($id)
    {
        $course = Course::with(['courseFee', 'instructor'])->findOrFail($id);
        return view('frontend.check-out', compact('course'));
    }

    public function Payment($id, Request $request)
    {
        $course = Course::find($id);

        if (!$course) {
            return back()->with('error', 'You cannot enroll in this course please register another course');
        }

        // dd($request->all());

        $paymeny = Payment::create([
            'user_id' => Auth()->id(),
            'course_id' => $id,
            'amount' => $request->price,
            'status' => 'completed',
        ]);

        $enrollment = Enrolment::create([
            'student_id' => Auth()->id(),
            'course_id' => $id,
            'status' => 'active',
        ]);

        $enrollment_courses = EnrollmentCourse::create([
            'course_id' => Auth()->id(),
            'enrollment_id' => $enrollment->id,
        ]);


        return back()->with('success', 'Payment Successfull');



    }
}
