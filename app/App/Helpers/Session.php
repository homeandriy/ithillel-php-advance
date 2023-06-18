<?php

namespace App\Helpers;

use App\Models\User;

class Session
{
    public static function check(): bool
    {
        return !empty($_SESSION['user']);
    }

    public static function userIsAdmin(): bool
    {
        if (!static::check()) {
            return false;
        }
        return (isset($_SESSION['user']) && 1 === (int)$_SESSION['user']->is_admin);
    }

    public static function getUser(): ?User
    {
        if (!static::check()) {
            return null;
        }
        return $_SESSION['user'];
    }

    public static function id(): int|null
    {
        return is_numeric($_SESSION['user']->id) ? $_SESSION['user']->id : null;
    }

    public static function setUserData($id, $options = [])
    {
        $options = array_merge(
            compact('id'),
            $options
        );

        $_SESSION['user_data'] = array_merge(
            $_SESSION['user_data'] ?? [],
            $options
        );
    }

    public static function destroy()
    {
        if (session_id()) {
            session_destroy();
        }
    }

    public static function notify(string $type, string $message)
    {
        $_SESSION['notify'] = compact('type', 'message');
    }

    public static function flushNotify()
    {
        unset($_SESSION['notify']);
    }
}
