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

    ];

    public function instructor()
    {
        return $this->belongsTo(User::class);
    }
}
