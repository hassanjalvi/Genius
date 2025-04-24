<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrolment;
use App\Models\StudentAssignmentSubmissions;
use App\Models\StudentQuizSubmissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrolmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function manageEnrollments()
    {
        $enrollmnet = Enrolment::with(['user', 'course'])->get();

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
        // $enroll = Course::where('instructor_id', Auth()->id())->with(['enrollment.user', 'enrollmentCourse'])->get();
        // dd($enroll);
        $enroll = Course::where('instructor_id', Auth::id())
            ->with(['enrollment.user', 'enrollmentCourse'])
            ->get()
            ->map(function ($course) {
                $course->enrollment->each(function ($enrollment) use ($course) {
                    // Get all graded assignments with their assignments
                    $assignments = StudentAssignmentSubmissions::with('assignment')
                        ->where('student_id', $enrollment->student_id)
                        ->where('course_id', $course->id)
                        ->whereNotNull('marks')
                        ->get()
                        ->filter(function ($item) {
                        return $item->assignment !== null; // Filter out submissions with deleted assignments
                    });

                    // Calculate totals safely
                    $totalMarksObtained = $assignments->sum('marks');
                    $totalPossibleMarks = $assignments->sum(function ($item) {
                        return $item->assignment->total_mark ?? 0;
                    });

                    // Calculate percentage (handle division by zero)
                    $percentage = $totalPossibleMarks > 0 ? ($totalMarksObtained / $totalPossibleMarks) * 100 : 0;

                    // Add grade information to the enrollment
                    $enrollment->grade_info = [
                        'total_marks_obtained' => $totalMarksObtained,
                        'total_possible_marks' => $totalPossibleMarks,
                        'percentage' => round($percentage, 2),
                        'grade' => $this->determineGrade($percentage),
                        'assignment_count' => $assignments->count()
                    ];
                });

                return $course;
            });

        return view('Instructor.manageenrollments', compact('enroll'));
    }

    private function calculateStudentGrade($studentId, $courseId)
    {
        // Get all graded assignments and quizzes
        $assignments = StudentAssignmentSubmissions::with('assignment')
            ->where('student_id', $studentId)
            ->where('course_id', $courseId)
            ->whereNotNull('marks')
            ->get();

        $quizzes = StudentQuizSubmissions::with('quiz')
            ->where('student_id', $studentId)
            ->where('course_id', $courseId)
            ->whereNotNull('marks')
            ->get();

        // Calculate totals
        $totalMarksObtained = $assignments->sum('marks') + $quizzes->sum('marks');
        $totalPossibleMarks = $assignments->sum(function ($item) {
            return $item->assignment->total_mark;
        }) + $quizzes->sum(function ($item) {
            return $item->quiz->total_mark;
        });

        // Calculate percentage
        $percentage = $totalPossibleMarks > 0 ? ($totalMarksObtained / $totalPossibleMarks) * 100 : 0;

        // Determine grade
        $grade = $this->determineGrade($percentage);

        return [
            'total_marks_obtained' => $totalMarksObtained,
            'total_possible_marks' => $totalPossibleMarks,
            'percentage' => round($percentage, 2),
            'grade' => $grade
        ];
    }


    private function determineGrade($percentage)
    {
        if ($percentage >= 90)
            return 'A';
        if ($percentage >= 80)
            return 'B';
        if ($percentage >= 70)
            return 'C';
        if ($percentage >= 60)
            return 'D';
        if ($percentage >= 50)
            return 'E';
        return 'Fail';
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
