<?php

namespace App\Models;

use App\Observers\CommentObserver;
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

    /*
     * OBSERVER
     */
    public static function boot()
    {
        parent::boot();
        Comment::observe(CommentObserver::class);
    }

    /*
     * Relationships
     **/
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }

}
