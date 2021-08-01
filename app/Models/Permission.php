<?php

namespace App\Models;


class Permission extends \Spatie\Permission\Models\Permission
{
    const CREATE = 'create';
    const VIEW = 'view';
    const UPDATE = 'update';
    const DELETE = 'delete';


    public static function getAllPermissionConstants()
    {
        return [
            self::CREATE,
            self::VIEW,
            self::UPDATE,
            self::DELETE,
        ];
    }
}
