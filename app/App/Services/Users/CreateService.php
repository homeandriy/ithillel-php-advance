<?php

namespace App\Services\Users;

use App\Models\User;

class CreateService
{
    public static function call($fields = []): bool
    {
        unset($fields['password_confirm']);

        $fields['password'] = static::hashPassword($fields['password']);

        return User::create($fields);
    }

    public static function hashPassword(string $rawPassword): string
    {
        return password_hash($rawPassword, PASSWORD_BCRYPT);
    }
}
