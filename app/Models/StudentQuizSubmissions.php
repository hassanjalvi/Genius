<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentQuizSubmissions extends Model
{
    protected $fillable = [
        'student_id',
        'course_id',
        'quiz_id',
        'file',
        'marks',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class);
    }


}
