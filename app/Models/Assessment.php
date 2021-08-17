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

    /*
     * Relationships
     **/
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /*
     * Scopes
     **/
    public function scopeCreatedByUserJoin($query, $userId = null)
    {
        $query = $query->leftjoin('users', function ($join) use ($userId) {
            $join->on('assessments.created_by', '=', 'users.id');

            if (! is_null($userId)) {
                $join->where('assessments.created_by', '=', $userId);
            }
        });

        if (! is_null($userId)) {
            $query->where('assessments.created_by', '=', $userId);
        }

        return $query;
    }
}
