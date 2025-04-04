<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
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
        return view('Admin.setupfees');
    }


    public function createcourse(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'course_name' => 'required|string|max:255',
            'course_description' => 'required|string|max:255',
            'course_syllabus' => 'required|string|max:255',
            'instructor_id' => 'required',
        ]);

        if ($validatedData->fails()) {
            return back()->withErrors($validatedData)->withInput();
        }


        $user = Course::create([
            'name' => $request->course_name,
            'description' => $request->course_description,
            'syllabus' => $request->course_syllabus,
            'instructor_id' => $request->instructor_id,
        ]);



        return redirect()->route('courses.manage')->with('success', 'Instructor added successfully');

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
    public function myCourses()
    {
        return view('Instructor.mycourses');
    }
    public function myCoursesContent()
    {
        return view('Instructor.mycoursecontent');
    }
    public function addVideo()
    {
        return view('Instructor.addvideos');
    }
    public function manageVideo()
    {
        return view('Instructor.managevideos');
    }
}
