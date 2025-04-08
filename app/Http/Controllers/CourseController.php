<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseFee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addCourses()
    {
        $instructor = User::where('role', 'instructor')->get();
        return view('Admin.addcourses', compact('instructor'));
    }
    public function manageCourses()
    {
        $course = Course::with('instructor')->get();
        $instructor = User::where('role', 'instructor')->get();
        return view('Admin.managecourses', compact('course', 'instructor'));
    }
    public function setupFees()
    {
        $courses = Course::where('status', 1)->get();
        return view('Admin.setupfees', compact('courses'));
    }


    public function createcourse(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_name' => 'required|string|max:255',
            'course_description' => 'required|string|max:255',
            'course_syllabus' => 'required|string|max:255',
            'instructor_id' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }


        $user = Course::create([
            'name' => $request->course_name,
            'description' => $request->course_description,
            'syllabus' => $request->course_syllabus,
            'instructor_id' => $request->instructor_id,
        ]);


        return redirect()->route('setup.fees')->with('success', 'Course added successfully. Please set up the fee for this course.');


    }

    public function deletecourse($id)
    {

        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->back()->with('success', 'Course deleted successfully!');

    }
    public function updatecourse(Request $request, $id)
    {
        $course = Course::where('id', $id)->first();

        $course->update([
            'name' => $request->course_name ?? $course->name,
            'description' => $request->course_description ?? $course->description,
            'syllabus' => $request->course_syllabus ?? $course->course_syllabus,
            'status' => $request->status ?? $course->status,
            'instructor_id' => $request->coutructor_id ?? $course->instructor_id,
        ]);




        return redirect()->back()->with('success', 'Instructor updated successfully!');

    }


    public function createSetupFeeForCourse(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|integer',
            'price' => 'required|integer',
            'payment_plan' => 'required|string|max:50',
            'discount' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }


        $user = CourseFee::create([
            'course_id' => $request->course_id,
            'course_duration' => $request->course_duration,
            'price' => $request->price,
            'discount' => $request->discount,
            'payment_plan' => $request->payment_plan,


        ]);


        return redirect()->route('setup.fees')->with('success', 'Course Fee Added Successfully');


    }


    public function myCourses()
    {
        $courses = Course::where('instructor_id', Auth::id())->get();

        return view('Instructor.mycourses', compact('courses'));
    }
    public function myCoursesContent()
    {
        return view('Instructor.mycoursecontent');
    }


}
