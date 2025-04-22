<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAssignmentSubmissions extends Model
{
    protected $fillable = [
        'student_id',
        'course_id',
        'assignment_id',
        'file',
        'marks',
    ];


    public function assignment()
    {
        return $this->belongsTo(StudentAssignmentSubmissions::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class);
    }

}
