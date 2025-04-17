<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseVideo extends Model
{
    protected $fillable = [
        'file',
        'course_id',
        'title'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
