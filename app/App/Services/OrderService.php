<?php

namespace App\Services;

use App\Models\Order;
use App\Validators\Base\BaseValidator;

class OrderService
{
    public static function create(BaseValidator $validator, array $fields = []): bool
    {
        if (!$validator->validate($fields)) {
            return false;
        }

        return Order::create($fields);
    }

    public static function update(BaseValidator $validator, array $fields = []): bool
    {
        if (!$validator->validate($fields, BaseValidator::TYPE_UPDATE)) {
            return false;
        }


        $category = Order::find($fields['id']);
        return $category->update($fields);
    }
}
