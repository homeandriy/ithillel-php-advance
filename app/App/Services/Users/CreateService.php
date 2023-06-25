<?php

namespace App\Services\Users;

use App\Models\User;

class CreateService
{
    public static ?int $userId ;
    public static function call($fields = []): bool
    {
        unset($fields['password_confirm']);

        $fields['password'] = static::hashPassword($fields['password']);
        static::$userId = User::create($fields);
        return (bool) static::$userId;
    }

    public static function hashPassword(string $rawPassword): string
    {
        return password_hash($rawPassword, PASSWORD_BCRYPT);
    }
}
