<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    protected $fillable = [
        'patient_information_id',
        'insomnia',
        'blood_pressure',
        'stroke',
        'heart_attack',
        'atrial_fibrillation',
        'diabetes',
        'gerd',
        'anxiety',
        'created_by',
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
