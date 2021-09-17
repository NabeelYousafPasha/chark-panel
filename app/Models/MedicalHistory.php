<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    protected $fillable = [
        'assessment_id',
        'smoker',
        'alcohol_with_dinner',
        'alcohol_with_dinner_quantity',
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
        'anxiolytics_value',
        'antidepressants',
        'antidepressants_value',
        'induce_sleep_medication',
        'induce_sleep_medication_value',
        'other_medications',
        'other_medications_value',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
