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
        return view('Instructor.managequizes');
    }

    public function createQuiz(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'quiz_number' => 'required|numeric',
            'pdf_quiz_title' => 'required|string',
            'quiz_type' => 'nullable|in:mcq,pdf',
            'pdf_quiz_file' => 'nullable',

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->quiz_type === 'pdf') {

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

        }


        if ($request->quiz_type === 'mcq') {



            $quiz = Quiz::create([
                'course_id' => $request->course_id,
                'number' => $request->quiz_number,
                'title' => $request->pdf_quiz_title,
                'type' => $request->quiz_type,
            ]);

            foreach ($request->questions as $key => $ques) {

                foreach ($request->option_a as $key => $a) {

                    foreach ($request->option_b as $key => $b) {

                        foreach ($request->option_c as $key => $c) {

                            foreach ($request->option_d as $key => $d) {
                                foreach ($request->correct_answers as $key => $correct_answerss) {

                                    $quizNumber = QuizQuestions::create([
                                        'quiz_id' => $quiz->id,
                                        'question' => $ques,
                                        // 'description'=>$request->description ?? null,
                                        'correct_option' => $correct_answerss,
                                    ]);

                                    $quizOptions = QuizOptions::create([
                                        'quiz_question_id' => $quizNumber->id,
                                        'option_a' => $a,
                                        'option_b' => $b,
                                        'option_c' => $c,
                                        'option_d' => $d,
                                        'is_correct' => $correct_answerss,
                                    ]);

                                }
                            }
                        }
                    }
                }



            }
        }

        return redirect()->back()->with('success', 'Quiz added successfully!');

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
