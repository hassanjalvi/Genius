<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\EnrollmentCourse;
use App\Models\Enrolment;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Session;
class CheckoutController extends Controller
{
    public function index($id)
    {
        $course = Course::with(['courseFee', 'instructor'])->findOrFail($id);
        return view('frontend.check-out', compact('course'));
    }

    public function Payment($id, Request $request)
    {

        // $validator = Validator::make($request->all(), [

        // ]);

        // if ($validator->fails()) {
        //     return back()->withErrors($validator)->withInput();
        // }



        try {

            $course = Course::find($id);


            if (!$course) {
                return back()->with('error', 'You cannot enroll in this course please register another course');
            }


            Stripe\Stripe::setApiKey(config('services.stripe.secret'));


            $StripeCheck = Stripe\Charge::create([
                // 'customer' =>'Ay7JqSvqzh',
                "amount" => $request->price * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'),
                "description" => "Enrollment payment for '" . $course->name . "' by " . auth()->user()->name,
            ]);

            // dd($request->stripeToken);






            // Session::flash('success', 'Payment successful!');

            // $validatedData = session('cart')->get('',);
            // TourPackage::create($validatedData);

            if ($StripeCheck) {



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
                    'course_id' => $id,
                    'enrollment_id' => $enrollment->id,
                ]);


                return back()->with('success', 'Payment Successfull');




            } else {
                Session::flash('error', 'Payment failed. Please try again.');
                return back();

            }
            // return response(['success' => 'Product added to cart successfully!']);





        } catch (\Exception $e) {
            //  Log::error($e->getMessage()); // Log the error message

            //return response(['error' => 'Something went wrong, please try again.'], 500);
            return redirect()->back()->withErrors(['error' => 'Something went wrong, please try again.']);

        }






    }
}
