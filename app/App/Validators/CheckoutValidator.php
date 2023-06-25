<?php

namespace App\Validators;

use App\Validators\Base\BaseValidator;

class CheckoutValidator extends Base\BaseValidator
{
    protected array $rules = [
        'name' => '/.{2,100}$/i',
        'address-city' => '/.{5,255}$/i',
        'address-street' => '/.{3,255}$/i',
        'address-house' => '/.{2,100}$/i',
        'email' => '/^[a-zA-Z0-9.!#$%&\'*+\/\?^_`{|}~-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i',
    ];

    protected array $errors = [
        'name' => 'Ім\'я  довжиною не менше двох символів, але не більше 100 символів',
        'address-city' => 'Область не менше 5 символів але не довше 255 символів',
        'address-street' => 'Вулиця не менше 3 символів але не довше 255 символів',
        'address-house' => 'Будинок не менше 2 символів але не довше 100 символів',
        'email' => 'Електронна адреса не вірна',
    ];

    public function validate(array $fields = [], string $type = self::TYPE_INSERT,): bool
    {
        $result = [
            parent::validate($fields),
        ];

        return !in_array(false, $result);
    }
}
