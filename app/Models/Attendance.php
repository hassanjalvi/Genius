<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'meeting_id',
        'student_id',
        'attended_at',
        'user_id',
    ];

    public function meeting()
    {
        return $this->belongsTo(LiveClass::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
