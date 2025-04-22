<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'number',
        'course_id',
        'title',
        'type',
        'documnet',
        'total_mark'
    ];

    public function questions()
    {
        return $this->hasMany(QuizQuestions::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function quizSubmission()
    {
        return $this->hasMany(StudentQuizSubmissions::class);
    }
}
