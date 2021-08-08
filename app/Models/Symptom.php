<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    protected $fillable = [
        'assessment_id',
        'snore',
        'apnea',
        'breathing_shortness',
        'average_sleep',
        'fragmented_sleep',
        'nocturia',
        'tired_during_day',
        'morning_headache',
        'nap',
        'sleepiness_during_day',
        'loss_of_concentration',
        'night_snoring_experience',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
