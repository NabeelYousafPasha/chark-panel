<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    protected $fillable = [
        'assessment_id',
        'smoker',
        'alcohol_with_dinner',
        'high_blood_pressure',
        'myocardial_infarction',
        'coronary_artery_disease',
        'arrhythmia',
        'heart_failure',
        'diabetes',
        'depression',
        'dementia',
        'stroke',
        'lung_disease',
        'hypothyroidism',
        'other_medical_history',
        'anxiolytics',
        'antidepressants',
        'induce_sleep_medication',
        'other_medications',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
