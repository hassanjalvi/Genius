<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'course_id',
        'student_id',
        'instructor_id',
        'message',
        'sender_id'
    ];
}
