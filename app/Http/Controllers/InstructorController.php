<?php

namespace App\Http\Controllers;
use App\Models\StudentQuizSubmissions;
use Illuminate\Support\Facades\Response;

use App\Models\Course;
use App\Models\Instructor;
use App\Models\StudentAssignmentSubmissions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InstructorController extends Controller
{
    /**i
     * Display a listing of the resource.
     */
    public function addInstructors()
    {

        $instructor = User::where('role', 'instructor')->with('instructor')->get();
        return view('Admin.addinstructors');
    }
    public function manageInstructors()
    {
        $instructor = User::where('role', 'instructor')->with('instructor')->get();
        return view('Admin.manageinstructors', compact('instructor'));
    }

    public function createInstructors(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'expertise' => 'required',
            'instructor_file' => 'required | mimes:png,jpg,jpeg,gif '
        ]);

        if ($validatedData->fails()) {
            return back()->withErrors($validatedData)->withInput();
        }

        $instructorPicPath = null;
        if ($request->hasFile('instructor_file')) {
            $instructorPicPath = rand() . time() . '.' . $request->instructor_file->extension();
            $request->instructor_file->move(public_path('instructor_files'), $instructorPicPath);
            $instructorPicPath = url('instructor_files') . '/' . $instructorPicPath;
        }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'instructor',


        ]);

        $expertise = Instructor::create([
            'user_id' => $user->id,
            'expertise' => $request->expertise,
            'pic' => $instructorPicPath ?? null,
            'feature' => $request->feature,
        ]);

        return redirect()->route('instructors.manage')->with('success', 'Instructor added successfully');

    }

    public function deleteInstructor($id)
    {

        $instructor = User::findOrFail($id); // Find user by ID
        $instructor->delete(); // Delete user

        return redirect()->back()->with('success', 'Instructor deleted successfully!');

    }
    public function updateInstructor(Request $request, $id)
    {
        $instructor = User::where('id', $id)->with('instructor')->first();

        $instructor->update([
            'name' => $request->name ?? $instructor->name,
            'email' => $request->email ?? $instructor->email,
            'status' => $request->status ?? $instructor->status,
        ]);

        if ($instructor->instructor) {
            $instructor->instructor->update([
                'expertise' => $request->expertise ?? $instructor->instructor->expertise,
            ]);
        }


        return redirect()->back()->with('success', 'Instructor updated successfully!');

    }
    public function showInstructor()
    {
        $courses = Course::where('instructor_id', Auth::id())->get();
        $total_courses = $courses->count();
        return view('Instructor.dashboard', compact('courses', 'total_courses'));
    }
    public function instructorChat()
    {
        return view('Instructor.chat');
    }
    public function assignTask()
    {
        $courseAssignmentSubmission = Course::where('instructor_id', Auth::id())->with('assignment.assignmentSubmission.student', 'courseQuiz.quizSubmission.student')->get();
        // dd($courseAssignmentSubmission);
        return view('Instructor.assignnumbers', compact('courseAssignmentSubmission'));
    }

    public function quizTask()
    {
        $courseAssignmentSubmission = Course::where('instructor_id', Auth::id())->with('assignment.assignmentSubmission.student', 'courseQuiz.quizSubmission.student')->get();
        // dd($courseAssignmentSubmission);
        return view('Instructor.quiznumbers', compact('courseAssignmentSubmission'));
    }

    public function viewAssignment($id)
    {
        $data = StudentAssignmentSubmissions::find($id);
        // $base64Pdf = base64_encode($data->file);
        // dd($data);
        return view('viewPdf', compact('data'));
    }

    public function viewQuiz($id)
    {
        $data = StudentQuizSubmissions::find($id);
        // $base64Pdf = base64_encode($data->file);
        // dd($data);
        return view('viewPdf', compact('data'));
    }

    public function storeAssignmentMark(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'mark' => 'required|numeric',
            'total_mark' => 'required|numeric',
        ]);

        if ($request->mark > $request->total_mark) {
            return redirect()->back()->withErrors(['mark' => 'The mark cannot be greater than the total mark.']);
        }



        $submission = StudentAssignmentSubmissions::findOrFail($request->submission_id);
        $submission->marks = $request->mark;
        // $submission->total_marks = $request->total_marks;
        $submission->save();

        return redirect()->back()->with('success', 'Marks uploaded successfully!');
    }

    public function storeQuizMark(Request $request)
    {

        $request->validate([
            'mark' => 'required|numeric',
            'total_mark' => 'required|numeric',
        ]);

        if ($request->mark > $request->total_mark) {
            return redirect()->back()->withErrors(['mark' => 'The mark cannot be greater than the total mark.']);
        }


        $submission = StudentQuizSubmissions::findOrFail($request->submission_id);
        $submission->marks = $request->mark;
        // $submission->total_marks = $request->total_marks;
        $submission->save();

        return redirect()->back()->with('success', 'Marks uploaded successfully!');
    }

    public function storeQuizMcqMark(Request $request)
    {
        // dd($request->all());

        $sub_quiz = StudentQuizSubmissions::create([
            'quiz_id' => $request->quiz_id,
            'student_id' => Auth::id(),
            'course_id' => $request->course,
            'marks' => $request->score,



        ]);
        // $submission = StudentQuizSubmissions::findOrFail($request->quiz_id);
        // $submission->marks = $request->score;
        // $submission->quiz_id = $request->quiz_id;
        // $submission->student_id = Auth::id();


        // $submission->course_id = $request->course_id;


        // $submission->total_marks = $request->total_marks;
        // $submission->save();

        return redirect()->back()->with('success', 'Marks uploaded successfully!');
    }



    // public function viewAssignment($id)
    // {
    //     $data = StudentAssignmentSubmissions::findOrFail($id);

    //     // Check the file path
    //     $filePath = public_path('assignment_files/' . basename($data->file));
    //     dd($filePath); // This will dump the full file path
    //     // dd($filePath); // This will dump the full file path

    //     return response()->file($filePath, ['content-type' => 'application/pdf']);
    // }


}
