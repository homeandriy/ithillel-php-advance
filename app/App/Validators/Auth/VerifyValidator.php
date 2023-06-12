<?php

namespace App\Validators\Auth;

use App\Models\User;
use App\Services\Users\CreateService;

class VerifyValidator extends Base
{
    private ?User $user;
    protected array $rules = [
        'email' => '/^[a-zA-Z0-9.!#$%&\'*+\/\?^_`{|}~-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i',
        'password' => '/[a-zA-Z0-9.!#$%&\'*+\/\?^_`{|}~-]{8,}/',
    ];

    protected array $errors = [
        'email' => 'Email is incorrect',
        'password' => 'Password is incorrect',
    ];

    public function userExist(string $email): bool
    {
        $user = User::findBy('email', $email);
        if ($user === false) {
            $this->setError('email', 'User not created or password error');
        }
        $this->user = $user instanceof User ? $user : null;
        return (bool)$user;
    }

    public function isPasswordHashEquals(string $password): bool
    {
        if (!$this->user instanceof User) {
            $this->setError('password', 'User not created or password error');
            return false;
        }
        if (!password_verify($password, $this->user->password)) {
            $this->setError('password', 'User not created or password error');
            return false;
        }
        return true;
    }

    public function validate(array $fields = []): bool
    {
        $result = [
            parent::validate($fields),
            $this->userExist($fields['email']),
            $this->isPasswordHashEquals($fields['password'])
        ];

        return !in_array(false, $result);
    }
}
