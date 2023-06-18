<?php

namespace App\Validators;

use App\Models\User;
use App\Services\Users\CreateService;
use App\Validators\Base\BaseValidator;

class UserValidator extends Auth\SignUpValidator
{
    public function validate(array $fields = [], string $type = self::TYPE_INSERT): bool
    {
        $result = [];
        if ($type === BaseValidator::TYPE_INSERT) {
            $result = [
                BaseValidator::validate($fields),
                !$this->checkEmailOnExists($fields['email'])
            ];
        }

        return !in_array(false, $result);
    }
}
