<?php

namespace App\Http\Controllers;

use App\Models\Enrolment;
use Illuminate\Http\Request;

class EnrolmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function manageEnrollments()
    {
        $enrollmnet = Enrolment::with(['user', 'course'])->get();
        // dd($enrollmnet);
        return view('Admin.manageenrollments', compact('enrollmnet'));
    }

    public function deleteEnrollmant($id)
    {

        $course = Enrolment::findOrFail($id);
        $course->delete();

        return redirect()->back()->with('success', 'Enrollment deleted successfully!');

    }
    public function updateEnrollmant(Request $request, $id)
    {

        $enrollment = Enrolment::where('id', $id)->with(['user', 'course'])
            ->first();

        dd($request->all(), $enrollment);

        $enrollment->update([
            'user_name' => $request->user_name ?? $enrollment->name,
            'user_email' => $request->user_email ?? $enrollment->description,
            'courses' => $request->courses ?? $enrollment->course_syllabus,
        ]);




        return redirect()->back()->with('success', 'Instructor updated successfully!');

    }
    public function manageCourseEnrollments()
    {
        return view('Instructor.manageenrollments');
    }
    
    public function index()
    {

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
