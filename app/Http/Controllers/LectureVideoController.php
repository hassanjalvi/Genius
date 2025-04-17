<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseVideo;
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
        $course = Course::where('id', $id)->latest()->first();
        return view('Instructor.mycoursecontent', compact('course'));
    }

    public function uploadVideo(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'course_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'video_file' => 'required|max:51200',
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
