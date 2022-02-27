<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentTeethJaw extends Model
{
    protected $fillable = [
        'assessment_id',
        'tooth_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
