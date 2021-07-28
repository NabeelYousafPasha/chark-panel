<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PdfReport extends Model
{
    protected $fillable = [
        'patient_information_id',
        'file_name',
        'file_path',
        'generated_by',
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];
}
