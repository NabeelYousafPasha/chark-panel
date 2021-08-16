<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = [
        'patient_id',
        'date',
        'created_by',
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];
    public function comments(){
        return $this->hasMany(Coment::class);
    }
}
