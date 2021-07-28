<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientInformation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'dob',
        'gender',
        'address',
        'city',
        'height',
        'weight',
        'bmi',
        'neck_size',
        'score',
        'created_by',
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];


    /**
     * Accessors & Mutators
     */
    public function getFullNameAttribute()
    {
        return ucwords($this->first_name)." ".ucwords($this->last_name);
    }

    public function getAgeViaDobAttribute()
    {
        return Carbon::parse($this->dob)
            ->diff(now());
    }

    /**
     * Scope
     **/
    public function scopeCreatedByUser($query)
    {
        return $query->leftjoin('users', 'patient_information.created_by', '=', 'users.id');
    }
}
