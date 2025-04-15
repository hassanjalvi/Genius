<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnrollmentCourse extends Model
{
    protected $fillable = [

        'course_id',
        'enrollment_id',

    ];

    public function enrollment()
    {
        return $this->belongsTo(Enrolment::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

}
