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
}
