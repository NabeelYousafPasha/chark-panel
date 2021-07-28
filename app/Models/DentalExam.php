<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DentalExam extends Model
{
    protected $fillable = [
        'patient_information_id',
        'scalloped_tongue',
        'bruxism',
        'tooth_wear',
        'mallampati_classification',
        'tonsil_classification',
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
