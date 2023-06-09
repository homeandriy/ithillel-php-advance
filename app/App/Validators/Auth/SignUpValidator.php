<?php

namespace App\Validators\Auth;

class SignUpValidator extends Base
{
    protected array $rules = [
        'name' => '/.{2,255}$/i',
        'email' => '/^[a-zA-Z0-9.!#$%&\'*+\/\?^_`{|}~-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i',
        'password' => '/[a-zA-Z0-9.!#$%&\'*+\/\?^_`{|}~-]{8,}/',
    ];

    protected array $errors = [
        'name' => 'Name need minimum 2 char',
        'email' => 'Email is incorrect',
        'password' => 'Password is incorrect',
    ];

    public function passwordConfirmation(string $pass, string $passConfirm): bool
    {
        if ($pass !== $passConfirm) {
            $this->setError('password_confirm', 'Passwords are not equals');
            return false;
        }

        return true;
    }

    public function validate(array $fields = [], string $type = self::TYPE_INSERT): bool
    {
        $result = [
            parent::validate($fields),
            $this->passwordConfirmation($fields['password'], $fields['password_confirm']),
            !$this->checkEmailOnExists($fields['email'])
        ];

        return !in_array(false, $result);
    }
}
