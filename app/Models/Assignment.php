<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = [
        'course_id',
        'assignment_file',
        'assignment_description',
        'assignment_title',
        'assigment_file'

    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function assignmentSubmission()
    {
        return $this->hasOne(StudentAssignmentSubmissions::class);
    }
}
