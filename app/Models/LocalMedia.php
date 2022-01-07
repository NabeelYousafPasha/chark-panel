<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocalMedia extends Model
{
    protected $fillable = [
        'assessment_id',
        'media_type',
        'name',
        'extension',
        'folder',
        'path',
        'uploaded_by',
    ];

    protected $dates = [
        'created_at',
        'deleted_at',
    ];
}
