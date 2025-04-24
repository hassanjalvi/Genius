<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\LiveClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZoomMettingController extends Controller
{
    public function zoomMeeting()
    {
        $courses = Course::where('instructor_id', Auth::id())->get();
        return view('instructor.zoommeeting', compact('courses'));
    }

    public function index($id)
    {
        $liveClasses = LiveClass::where('course_id', $id)->with(['course', 'instructor'])->get();
        return view('student.studentliveclass', compact('liveClasses'));
    }

    public function createMetting(Request $request)
    {

        $request->validate([
            'zoom_link' => 'required',
            'meeting_time' => 'required',
            'course_id' => 'requireds',
        ]);

        $course = LiveClass::create([
            'zoom_link' => $request->zoom_link,
            'course_id' => $request->course_id,
            'instructor_id' => Auth::id(),
            'meeting_time' => $request->meeting_time,
        ]);



        return redirect()->back()->with('success', 'Live class link added successfully');
    }

    public function markAttendance($id)
    {
        // Example: Save attendance record
        $studentId = auth()->id();

        // Check if the student has already marked attendance for this meeting
        $alreadyMarked = Attendance::where('student_id', $studentId)
            ->where('meeting_id', $id)
            ->exists();

        if ($alreadyMarked) {
            return response()->json(['message' => 'Attendance already marked'], 200);


        }

        Attendance::Create([
            'student_id' => auth()->id(),
            'meeting_id' => $id,
            'attended_at' => now(),
        ]);

        return response()->json(['message' => 'Attendance marked']);
    }
}
