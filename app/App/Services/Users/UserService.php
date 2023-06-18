<?php

namespace App\Services\Users;

use App\Models\User;
use App\Validators\Base\BaseValidator;

class UserService
{
    public static function update(BaseValidator $validator, array $fields = []): bool
    {
        if (!$validator->validate($fields, BaseValidator::TYPE_UPDATE)) {
            return false;
        }
        $user = User::find($fields['id']);
        if (!empty($fields['password']) && !password_verify($fields['password'], $user->password)) {
            $fields['password'] = CreateService::hashPassword($fields['password']);
        } else {
            unset($fields['password']);
        }
        return $user->update($fields);
    }
}
