<?php

namespace App\Models;

use Core\Model;

class User extends Model
{
    public string $email, $password, $created_at;

    protected static string|null $tableName = 'users';

    public function orders()
    {
        return Order::findByCollection('user_id', $this->id);
    }
}
