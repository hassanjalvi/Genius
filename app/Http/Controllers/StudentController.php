<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function manageStudents()
    {
        $students = User::where('role', 'user')->get();
        return view('Admin.managestudents', compact('students'));
    }

    public function studentDelete($id)
    {

        $student = User::findOrFail($id); // Find user by ID
        $student->delete(); // Delete user

        return redirect()->back()->with('success', 'User deleted successfully!');

    }
    public function studentUpdate(Request $request, $id)
    {

        $students = User::where('id', $id)->first();

        $students->update([
            'name' => $request->name ?? $students->name,
            'email' => $request->email ?? $students->email,
            'status' => $request->status ?? $students->status,
        ]);

        return redirect()->back()->with('success', 'User deleted successfully!');

    }
    public function studentProgress($id)
    {
        $stu_assignment = User::where('id', $id)->with('enrolmnets.course.assignment.assignmentSubmission')->get();
        $stu_quiz = User::where('id', $id)->with('enrolmnets.course.courseQuiz.quizSubmission')->get();
        $stu_attendance = User::where('id', $id)->with('enrolmnets.course.liveClass.attendances')->get();

        // dd($stu_attendance);


        // dd($stu_assignment);
        return view('Instructor.studentprogress', compact('stu_assignment', 'stu_quiz', 'stu_attendance'));
    }
    public function showStudent()
    {
        $user = User::where('id', Auth::id())->with('enrolmnets.course')->first();
        $total_courses = $user->enrolmnets->count();
        // dd($user);
        return view('Student.dashboard', compact('user', 'total_courses'));
    }
    public function studentChat($id)
    {
        $chat = Chat::where('course_id', $id)->get();
        $currentUserId = auth()->id(); // Get the current authenticated user's ID
        return view('Student.chat', compact('chat', 'currentUserId', 'id'));
    }

    public function instructorChat($id)
    {
        $chat = Chat::where('course_id', $id)->get();
        $currentUserId = auth()->id(); // Get the current authenticated user's ID
        return view('Instructor.chat', compact('chat', 'currentUserId', 'id'));
    }

    public function storeChat(Request $request)
    {
        $chat = Chat::create([
            'message' => $request->message,
            'sender_id' => $request->sender_id,
            'course_id' => $request->course_id,
        ]);

        return redirect()->back()->with('success', 'mesage sent successfully');
    }

    public function myProgress()
    {
        return view('Student.myprogrss');
    }
   
}
