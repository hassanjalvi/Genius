<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'submission_id',
        'instructor_id',
        'grade',
        'feedback',
    ];
}
