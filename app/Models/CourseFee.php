<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseFee extends Model
{
    protected $fillable = [
        'course_id',
        'course_duration',
        'price',
        'discount',
        'payment_plan',
    ];
}
