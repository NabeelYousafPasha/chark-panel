<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SleepExam extends Model
{
    protected $fillable = [
        'patient_information_id',
        'snore',
        'tired',
        'stop_breathing',
        'high_blood_pressure',
        'created_by',
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
