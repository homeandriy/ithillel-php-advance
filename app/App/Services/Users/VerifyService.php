<?php

namespace App\Services\Users;

use App\Models\User;

class VerifyService
{
    public static function login($fields = []): bool
    {
        $user = User::findBy('email', $fields['email']);
        if (!$user) {
            return false;
        }
        $user->password = '';
        $_SESSION['user'] = $user;

        return true;
    }

    public static function logout(): bool
    {
        if (!isset($_SESSION['user'])) {
            return false;
        }
        unset($_SESSION['user']);
        return true;
    }
}
