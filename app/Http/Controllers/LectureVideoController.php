<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseVideo;
use App\Models\LiveClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LectureVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addVideo()
    {
        $courses = Course::where('instructor_id', Auth()->id())->get();
        return view('Instructor.addvideos', compact('courses'));
    }
    public function manageVideo()
    {
        $courseVideo = Course::with('courseVideo')->latest()->get();

        return view('Instructor.managevideos', compact('courseVideo'));
    }

    public function myCoursesContent($id)
    {
        $course = Course::where('id', $id)->with('enrollment', 'assignment', 'courseVideo', 'courseQuiz')->latest()->first();
        if ($course) {
            $total_video = $course->courseVideo->count();
            $total_assignment = $course->assignment->count();
            $total_enrollment = $course->enrollment->count();
            $total_quiz = $course->courseQuiz->count();

        } else {
            $total_video = 0;
            $total_assignment = 0;
            $total_quiz = 0;
        }
        return view('Instructor.mycoursecontent', compact('course', 'total_video', 'total_assignment', 'total_enrollment', 'total_quiz'));
    }

    public function uploadVideo(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'course_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'video_file' => 'required|file|max:51200',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        // dd($request->all());


        $videoPicPath = null;
        if ($request->hasFile('video_file')) {
            $videoPicPath = rand() . time() . '.' . $request->video_file->extension();
            $request->video_file->move(public_path('video_files'), $videoPicPath);
            $videoPicPath = url('video_files') . '/' . $videoPicPath;
        }

        $video = CourseVideo::create([
            'title' => $request->title,
            'course_id' => $request->course_id,
            'file' => $videoPicPath,

        ]);


        return redirect()->route('mycourses.videos.manage')->with('success', 'Video added successfully.');

    }



    public function deleteCourseVideo($id)
    {

        $course = CourseVideo::findOrFail($id);
        $course->delete();

        return redirect()->back()->with('success', 'Video deleted successfully!');

    }
    public function updateCourseVideo(Request $request, $id)
    {
        $course = CourseVideo::where('id', $id)->first();

        $validator = Validator::make($request->all(), [

            'video_file' => 'nullable|max:51200',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }


        $videoPicPath = null;
        if ($request->hasFile('video_file')) {
            $videoPicPath = rand() . time() . '.' . $request->video_file->extension();
            $request->video_file->move(public_path('video_files'), $videoPicPath);
            $videoPicPath = url('video_files') . '/' . $videoPicPath;
        }

        $course->update([
            'title' => $request->title ?? $course->title,
            'course_id' => $request->course_id ?? $course->course_id,
            'file' => $videoPicPath ?? $course->file,

        ]);


        return redirect()->route('mycourses.videos.manage')->with('success', 'Video updated successfully.');
    }
    public function myCoursesContentStudent($id)
    {
        $course = Course::where('id', $id)->with('courseVideo', 'assignment', 'courseQuiz')->first();
        $total_live_class = LiveClass::where('course_id', $id)->count();

        $totalVideos = $course->courseVideo ? $course->courseVideo->count() : 0;
        $totalAssignments = $course->assignment ? $course->assignment->count() : 0;
        $totalQuizzes = $course->courseQuiz ? $course->courseQuiz->count() : 0;

        return view('Student.mycoursescontent', compact('course', 'totalVideos', 'totalAssignments', 'totalQuizzes', 'total_live_class'));
    }
    public function sawvideo($id)
    {
        $video = CourseVideo::where('course_id', $id)->get();
        return view('Student.videos', compact('video'));
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
