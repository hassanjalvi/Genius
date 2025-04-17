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
    ];

    public function questions()
    {
        return $this->hasMany(QuizQuestions::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
