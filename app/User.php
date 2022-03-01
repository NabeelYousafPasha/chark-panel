<?php

namespace App;

use App\Notifications\EmailVerification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'username',
        'email',
        'address',
        'city',
        'state',
        'postal_code',
        'country_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        // 'email_verified_at',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    /*
     * Accessors & Mutators
     **/
    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new EmailVerification());
    }
}
