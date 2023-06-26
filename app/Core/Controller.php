<?php

namespace Core;

use App\Validators\Base\BaseValidator;

class Controller
{
    public function before(string $action): bool
    {
        return true;
    }
    protected function getErrors(array $fields, BaseValidator $validator, $errors = []): array
    {
        return [
            'fields' => $fields,
            'errors' => array_merge($validator->getErrors(), $errors)
        ];
    }
    public function after(string $action){}
}
