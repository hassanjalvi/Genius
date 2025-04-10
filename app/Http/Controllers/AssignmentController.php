<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function manageAssignment()
    {
        // $coursesAssigment = Course::where('instructor_id', Auth::id())->with('assignment')->get();
        // dd($coursesAssigment);
        return view('Instructor.manageAssignments');
    }
    public function addAssignment()
    {
        $courses = Course::where('instructor_id', Auth::id())->get();

        return view('Instructor.addasginments', compact('courses'));
    }



    public function createAssignment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
            'assignment_title' => 'required|string',
            'assignment_description' => 'required|string',
            'assignment_file' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $assigmentPicPath = null;
        if ($request->hasFile('assignment_file')) {
            $assigmentPicPath = rand() . time() . '.' . $request->assignment_file->extension();
            $request->assignment_file->move(public_path('assignment_files'), $assigmentPicPath);
            $assigmentPicPath = url('assignment_files') . '/' . $assigmentPicPath;
        }


        $user = Assignment::create([
            'course_id' => $request->course_id,
            'assignment_title' => $request->assignment_title,
            'assignment_description' => $request->assignment_description,
            'assignment_file' => $assigmentPicPath,
        ]);


        return redirect()->route('mycourses.assignment.manage')->with('success', 'Course assigment added successfully');


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


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
