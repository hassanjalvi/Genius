<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'user_id',
        'expertise'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
