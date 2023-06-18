<?php

namespace App\Validators;

use App\Models\Order;
use App\Validators\Base\BaseValidator;

class OrderValidator extends Base\BaseValidator
{
    protected array $rules = [
        'user_id' => '/[1-9]\d*/i',
        'sum' => '/^(0|[1-9]\d*)(\.\d{2})?$/',
        'address' => '/.+$/i'
    ];

    protected array $errors = [
        'user_id' => 'Invalid user',
        'sum' => 'Sum must be more 0₴',
        'address' => 'Address should be more then 1 symbol',
    ];

    public function validate(array $fields = [], string $type = self::TYPE_INSERT,): bool
    {
        $result = [];
        if ($type === BaseValidator::TYPE_INSERT) {
            $result = [
                parent::validate($fields),
            ];
        }
        if ($type === BaseValidator::TYPE_UPDATE) {
            /** @var Order $product */
            $product = Order::find($fields['id']);
            if (!$product) {
                $this->setError('id', 'Product not found');
            }
            if (!in_array($fields['status'], array_keys(Order::ORDER_STATUS_LIST))) {
                $this->setError('status', 'Status ' . htmlspecialchars($fields['status']) . ' not found');
            }
        }

        return !in_array(false, $result);
    }
}
