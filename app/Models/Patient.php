<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\PatientDetail;
use App\Models\Clinic;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'alias',
        'email',
        'gender',
        'dob',
        'clinic_id',
        'country_id',
        'created_by',
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    /*
     * Accessors & Mutators
     **/
    public function getAgeViaDobAttribute()
    {
        return Carbon::parse($this->dob)
            ->diff(now());
    }

    /**
     * Relationships
     */
    public function patient_detail()
    {
        return $this->hasOne(PatientDetail::class);
    }
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    /**
     * Scope
     **/
    public function scopeCreatedByUser($query, $userId = null)
    {
        $query = $query->leftjoin('users', function ($join) use ($userId) {
            $join->on('patients.created_by', '=', 'users.id');

            if (! is_null($userId)) {
                $join->where('patients.created_by', '=', $userId);
            }
        });

        if (! is_null($userId)) {
            $query->where('patients.created_by', '=', $userId);
        }

        return $query;
    }

    public function scopeCountryJoin($query, $countryId = null)
    {
        $query = $query->leftjoin('countries', function ($join) use ($countryId) {
            $join->on('patients.country_id', '=', 'countries.id');

            if (! is_null($countryId)) {
                $join->where('patients.country_id', '=', $countryId);
            }
        });

        if (! is_null($countryId)) {
            $query->where('patients.country_id', '=', $countryId);
        }

        return $query;
    }

    public function scopeClinicJoin($query, $clinicId = null)
    {
        $query = $query->leftjoin('clinics', function ($join) use ($clinicId) {
            $join->on('patients.clinic_id', '=', 'clinics.id');

            if (! is_null($clinicId)) {
                $join->where('patients.clinic_id', '=', $clinicId);
            }
        });

        if (! is_null($clinicId)) {
            $query->where('patients.clinic_id', '=', $clinicId);
        }

        return $query;
    }

    
}
