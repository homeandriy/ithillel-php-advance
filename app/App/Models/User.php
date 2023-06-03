<?php

namespace App\Models;

use Core\DB;
use Core\Model;

class User extends Model
{
    public ?int $id;
    public string $email, $password, $created_at;

    protected static string|null $tableName = 'users';

    public function orders()
    {
        if (is_numeric($this->id)) {
            return Order::find($this->id);
        }
        return Order::findBy('session_id', session_id());
    }
}
