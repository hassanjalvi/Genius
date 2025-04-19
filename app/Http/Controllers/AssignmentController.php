<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\CourseVideo;
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
        $coursesAssigment = Course::where('instructor_id', Auth::id())->with('assignment')->get();
        // dd($coursesAssigment);
        return view('Instructor.manageAssignments', compact('coursesAssigment'));
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

        $assignmentPicPath = null;
        if ($request->hasFile('assignment_file')) {
            $assignmentPicPath = rand() . time() . '.' . $request->assignment_file->extension();
            $request->assignment_file->move(public_path('assignment_files'), $assignmentPicPath);
            $assignmentPicPath = url('assignment_files') . '/' . $assignmentPicPath;
        }


        $user = Assignment::create([
            'course_id' => $request->course_id,
            'assignment_title' => $request->assignment_title,
            'assignment_description' => $request->assignment_description,
            'assigment_file' => $assignmentPicPath,
        ]);


        return redirect()->route('mycourses.assignment.manage')->with('success', 'Course assigment added successfully');


    }

    public function deleteAssignment($id)
    {

        $course = Assignment::findOrFail($id);
        $course->delete();

        return redirect()->back()->with('success', 'Assignment deleted successfully!');

    }
    public function updateAssignment(Request $request, $id)
    {
        // dd($request->all(), $id);
        $assignment = Assignment::where('id', $id)->first();

        $assignmentPicPath = null;
        if ($request->hasFile('assignment_file')) {
            $assignmentPicPath = rand() . time() . '.' . $request->assignment_file->extension();
            $request->assignment_file->move(public_path('assignment_files'), $assignmentPicPath);
            $assignmentPicPath = url('assignment_files') . '/' . $assignmentPicPath;
        }

        $assignment->update([
            'assignment_title' => $request->assignment_title ?? $assignment->assignment_title,
            'assignment_file' => $assignmentPicPath ?? $assignment->assignment_file,

        ]);


        return redirect()->back()->with('success', 'Assignment updated successfully!');

    }
    public function studentAssignments()
    {
        return view('Student.assignments');
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
