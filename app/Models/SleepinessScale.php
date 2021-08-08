<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SleepinessScale extends Model
{
    protected $fillable = [
        'assessment_id',
        'while_sitting_and_reading',
        'while_watching_television',
        'while_inactive_in_public_place',
        'while_travelling',
        'while_laying_down_in_afternoon',
        'while_talking',
        'while_sitting_after_lunch',
        'while_driving',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
