<?php

namespace App\Validators\Base;

class BaseValidator
{
    public const TYPE_INSERT = 'insert';
    public const TYPE_UPDATE = 'update';

    protected array $rules = [], $errors = [];

    public function validate(array $fields = [], string $type = self::TYPE_INSERT): bool
    {
        foreach ($fields as $key => $value) {
            if (!empty($this->rules[$key]) && preg_match($this->rules[$key], $value)) {
                unset($this->errors[$key]);
            }
        }

        return empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function setError(string $key, string $message)
    {
        $this->errors[$key] = $message;
    }
}
