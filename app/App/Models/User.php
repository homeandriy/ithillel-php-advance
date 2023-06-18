<?php

namespace App\Models;

use App\Helpers\Session;
use Core\Model;

class User extends Model
{
    public const USER_ADMIN = 1;
    public const USER_CLIENT = 0;
    public const USER_STATUS_LIST = [self::USER_ADMIN => 'Адміністратор', self::USER_CLIENT => 'Клієнт'];
    public string $email, $password, $created_at, $name;
    public int $is_admin;
    protected static string|null $tableName = 'users';

    public function orders()
    {
        return Order::findByCollection('user_id', $this->id);
    }

    public static function auth(): bool
    {
        return isset($_SESSION['user']);
    }

    public static function Instance(): ?User
    {
        return Session::getUser();
    }
}
