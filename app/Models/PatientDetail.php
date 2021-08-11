<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;

class PatientDetail extends Model
{
    protected $fillable = [
        'patient_id',
        'profession',
        'personal_id',
        'contact',
        'address',
        'postal_code',
        'city',
        'province',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /*
     * Relationships
     */
    public function patient() {
        return $this->belongsTo(Patient::class);
    }
}
