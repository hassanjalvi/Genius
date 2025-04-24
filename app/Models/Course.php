<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'description',
        'syllabus',
        'instructor_id',
        'status',
        'pic',

    ];

    public function instructor()
    {
        return $this->belongsTo(User::class);
    }

    public function enrollment()
    {
        return $this->hasMany(Enrolment::class, 'course_id');
    }

    public function enrollmentCourse()
    {
        return $this->belongsTo(Enrolment::class, 'course_id');
    }

    public function paymnet()
    {
        return $this->hasMany(Payment::class, 'course_id');
    }

    public function courseFee()
    {
        return $this->hasOne(CourseFee::class);
    }

    public function assignment()
    {
        return $this->hasMany(Assignment::class);
    }

    public function courseVideo()
    {
        return $this->hasMany(CourseVideo::class);
    }

    public function courseQuiz()
    {
        return $this->hasMany(Quiz::class);
    }

    public function liveClass()
    {
        return $this->hasMany(LiveClass::class);
    }
}
