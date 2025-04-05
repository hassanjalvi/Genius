<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnrollmentCourse extends Model
{
    protected $fillable = [

        'course_id',

    ];

    public function enrollment()
    {
        return $this->belongsTo(Enrolment::class);
    }

}
