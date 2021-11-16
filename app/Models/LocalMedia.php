<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocalMedia extends Model
{
    protected $fillable = [
        'assessment_id',
        'type',
        'name',
        'extension',
        'folder',
        'path',
    ];
}
