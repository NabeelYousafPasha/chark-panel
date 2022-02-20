<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeethJaw extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tooth_name',
        'type',
        'jaw',
        'position',
        'image',
        'order',
        'created_by',
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
