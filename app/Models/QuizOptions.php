<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizOptions extends Model
{
    protected $fillable = [
        'quiz_question_id',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_option',
    ];


    public function question()
    {
        return $this->belongsTo(QuizOptions::class, 'quiz_question_id');
    }

}
