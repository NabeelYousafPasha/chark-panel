<?php

namespace App\Models;


class Role extends \Spatie\Permission\Models\Role
{
    const ADMIN = 'admin';
    const USER = 'user';

    public static function getRoles()
    {
        return [
            self::ADMIN,
            self::USER,
        ];
    }

    public function scopeExceptAdmin($query)
    {
        return $query->whereNotIn('roles.name', [
            self::ADMIN,
        ]);
    }
}
