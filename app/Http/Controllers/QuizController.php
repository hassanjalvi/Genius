<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
use App\Models\QuizOptions;
use App\Models\QuizQuestions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addQuizes()
    {
        $courses = Course::where('instructor_id', Auth::id())->get();
        return view('Instructor.addquizes', compact('courses'));
    }
    public function manageQuizes()
    {
        $course = Course::with('courseQuiz')->get();
        return view('Instructor.managequizes', compact('course'));
    }
    public function studentQuizes()
    {
       return view('Student.quizes');
    }
    public function attemptQuizes()
    {
       return view('Student.attemptquiz');
    }
    // public function createQuiz(Request $request)
    // {
    //     // dd($request->all());

    //     $validator = Validator::make($request->all(), [
    //         'quiz_number' => 'required|numeric',
    //         'pdf_quiz_title' => 'required|string',
    //         'quiz_type' => 'nullable|in:mcq,pdf',
    //         'pdf_quiz_file' => 'nullable',

    //     ]);

    //     if ($validator->fails()) {
    //         return back()->withErrors($validator)->withInput();
    //     }

    //     if ($request->quiz_type === 'pdf') {

    //         $quizPicPath = null;
    //         if ($request->hasFile('pdf_quiz_file')) {
    //             $quizPicPath = rand() . time() . '.' . $request->pdf_quiz_file->extension();
    //             $request->pdf_quiz_file->move(public_path('pdf_quiz_files'), $quizPicPath);
    //             $quizPicPath = url('pdf_quiz_files') . '/' . $quizPicPath;
    //         }


    //         $quiz = Quiz::create([
    //             'course_id' => $request->course_id,
    //             'number' => $request->quiz_number,
    //             'title' => $request->pdf_quiz_title,
    //             'type' => $request->quiz_type,
    //             'documnet' => $quizPicPath,
    //         ]);

    //         return redirect()->route('mycourses.quiz.manage')->with('success', 'Quiz added successfully');


    //     }


    //     if ($request->quiz_type === 'mcq') {



    //         $quiz = Quiz::create([
    //             'course_id' => $request->course_id,
    //             'number' => $request->quiz_number,
    //             'title' => $request->pdf_quiz_title,
    //             'type' => $request->quiz_type,
    //         ]);


    //         // foreach ($request->mcqs as $mcq) {

    //         //     $quizNumber = QuizQuestions::create([
    //         //         'quiz_id' => $quiz->id,
    //         //         'question' => $mcq->question,
    //         //         // 'description'=>$request->description ?? null,
    //         //         'correct_option' => $mcq->correct_answer,
    //         //     ]);


    //         //     $quizOptions = QuizOptions::create([
    //         //         'quiz_question_id' => $quizNumber->id,
    //         //         'option_a' => $mcq->options->A,
    //         //         'option_b' => $mcq->options->B,
    //         //         'option_c' => $mcq->options->C,
    //         //         'option_d' => $mcq->options->D,
    //         //         'is_correct' => $mcq->correct_answer,
    //         //     ]);

    //         // }
    //         foreach ($request->mcqs as $mcq) {

    //             $quizNumber = QuizQuestions::create([
    //                 'quiz_id' => $quiz->id,
    //                 'question' => $mcq['question'], // ✅ ARRAY syntax
    //                 // 'description'=>$request->description ?? null,
    //                 'correct_option' => $mcq['correct_answer'],
    //             ]);

    //             $quizOptions = QuizOptions::create([
    //                 'quiz_question_id' => $quizNumber->id,
    //                 'option_a' => $mcq['options']['A'],
    //                 'option_b' => $mcq['options']['B'],
    //                 'option_c' => $mcq['options']['C'],
    //                 'option_d' => $mcq['options']['D'],
    //                 'is_correct' => $mcq['correct_answer'],
    //             ]);
    //         }

    //     }



    //     return redirect()->route('mycourses.quiz.manage')->with('success', 'Quiz added successfully');

    // }



    public function createQuiz(Request $request)
    {
        // First validate common fields
        $validator = Validator::make($request->all(), [
            'course_id' => 'required|exists:courses,id',
            'quiz_number' => 'required|numeric|min:1',
            'quiz_type' => 'required|in:mcq,pdf',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Type-specific validation
        if ($request->quiz_type === 'pdf') {
            $validator = Validator::make($request->all(), [
                'pdf_quiz_title' => 'required|string|max:255',
                'pdf_quiz_file' => 'required|file|mimes:pdf,doc,docx|max:2048',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $quizPicPath = null;
            if ($request->hasFile('pdf_quiz_file')) {
                $quizPicPath = rand() . time() . '.' . $request->pdf_quiz_file->extension();
                $request->pdf_quiz_file->move(public_path('pdf_quiz_files'), $quizPicPath);
                $quizPicPath = url('pdf_quiz_files') . '/' . $quizPicPath;
            }

            $quiz = Quiz::create([
                'course_id' => $request->course_id,
                'number' => $request->quiz_number,
                'title' => $request->pdf_quiz_title,
                'type' => $request->quiz_type,
                'documnet' => $quizPicPath,
            ]);

            return redirect()->route('mycourses.quiz.manage')->with('success', 'PDF Quiz added successfully');
        }

        if ($request->quiz_type === 'mcq') {
            $validator = Validator::make($request->all(), [
                'mcq_title' => 'required|string|max:255',
                'mcq_count' => 'required|numeric|min:1',
                'mcqs' => 'required|array|min:1',
                'mcqs.*.question' => 'required|string|max:500',
                'mcqs.*.options.A' => 'required|string|max:255',
                'mcqs.*.options.B' => 'required|string|max:255',
                'mcqs.*.options.C' => 'required|string|max:255',
                'mcqs.*.options.D' => 'required|string|max:255',
                'mcqs.*.correct_answer' => 'required|in:A,B,C,D',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $quiz = Quiz::create([
                'course_id' => $request->course_id,
                'number' => $request->quiz_number,
                'title' => $request->mcq_title,
                'type' => $request->quiz_type,
            ]);

            foreach ($request->mcqs as $mcq) {
                $quizQuestion = QuizQuestions::create([
                    'quiz_id' => $quiz->id,
                    'question' => $mcq['question'],
                    'correct_option' => $mcq['correct_answer'],
                    'description' => $mcq['description'] ?? null,
                ]);

                QuizOptions::create([
                    'quiz_question_id' => $quizQuestion->id,
                    'option_a' => $mcq['options']['A'],
                    'option_b' => $mcq['options']['B'],
                    'option_c' => $mcq['options']['C'],
                    'option_d' => $mcq['options']['D'],
                    'is_correct' => $mcq['correct_answer'],
                ]);
            }

            return redirect()->route('mycourses.quiz.manage')->with('success', 'MCQ Quiz added successfully');
        }

        return back()->with('error', 'Invalid quiz type')->withInput();
    }
    public function deleteQuiz($id)
    {

        $course = Quiz::findOrFail($id);
        $course->delete();

        return redirect()->back()->with('success', 'Quiz deleted successfully!');

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
