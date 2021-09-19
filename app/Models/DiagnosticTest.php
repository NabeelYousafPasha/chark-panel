<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class DiagnosticTest extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'assessment_id',
        'ahi',
        'rdi',
        'nadir',
        'odi',
        'avg_duration_of_apnea',
        'max_duration_of_apnea',
        'assessments_observation',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
