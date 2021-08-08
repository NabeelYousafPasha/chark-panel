<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiagnosticTest extends Model
{
    protected $fillable = [
        'assessment_id',
        'iah',
        'ia',
        'ih',
        'sat_2_min',
        'ct90',
        'avg_duration_of_apnea',
        'max_duration_of_apnea',
        'assessments_observation',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
