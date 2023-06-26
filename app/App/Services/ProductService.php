<?php

namespace App\Services;

use App\Models\Product;
use App\Validators\Base\BaseValidator;

class ProductService
{
    public static function create(BaseValidator $validator, array $fields = []): bool
    {
        if (!$validator->validate($fields)) {
            return false;
        }

        return Product::create($fields);
    }

    public static function update(BaseValidator $validator, array $fields = []): bool
    {
        if (!$validator->validate($fields, BaseValidator::TYPE_UPDATE)) {
            return false;
        }

        $category = Product::find($fields['id']);
        return $category->update($fields);
    }

    public static function destroy(int $productId): bool
    {
        $product = Product::find($productId);
        return $product->destroy();
    }
}
