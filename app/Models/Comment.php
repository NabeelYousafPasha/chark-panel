<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'patient_id',
        'assessment_id',
        'comment',
        'created_by',
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
