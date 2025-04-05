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
        return $this->belongsTo(User::class);
    }
}
