<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrolment extends Model
{
    protected $fillable = [
        'student_id',
        'course_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function enrollmentCourses()
    {
        return $this->belongsTo(EnrollmentCourse::class);
    }
}
