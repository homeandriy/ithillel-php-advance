<?php

namespace App\Validators;

use App\Models\Product;
use App\Validators\Base\BaseValidator;

class ProductValidator extends Base\BaseValidator
{
    protected array $rules = [
        'name' => '/.{2,255}$/i',
        'description' => '/.+$/i',
        'slug' => '/.+$/i',
        'price' => '/^(0|[1-9]\d*)(\.\d{2})?$/',
        'price_sale' => '/^(0|[1-9]\d*)(\.\d{2})?$/',
        'sku' => '/.{3,255}$/i',
        'is_active' => '/^[0-1]{1}/i',
        'category_id' => '/[1-9]\d*/i',
    ];

    protected array $errors = [
        'name' => 'Title should be more then 3 symbols but less then 255',
        'description' => 'Content should be more then 1 symbol',
        'slug' => 'Content should be more then 1 symbol',
        'price' => 'Please, enter correct price',
        'price_sale' => 'Please, enter correct sale price',
        'sku' => 'SKU need more than 3 symbols  but less then 255',
        'is_active' => 'Active is 0 - inactive or 1 - active',
        'category_id' => 'Incorrect Category ID (id start 1 and more)',
    ];

    public function validate(array $fields = [], string $type = self::TYPE_INSERT,): bool
    {
        $result = [];
        if ($type === BaseValidator::TYPE_INSERT) {
            $result = [
                parent::validate($fields),
                $this->validateUniqueSlug($fields['slug']),
                $this->validateUniqueSku($fields['sku']),
                $this->validatePrice($fields['price'], $fields['price_sale'])
            ];
        }
        if ($type === BaseValidator::TYPE_UPDATE) {
            /** @var Product $product */
            $product = Product::find($fields['id']);
            if (!$product) {
                $this->setError('id', 'Product not found');
            }
            $slugValidation = true;
            if ($fields['slug'] !== $product->slug) {
                $slugValidation = $this->validateUniqueSlug($fields['slug']);
            }
            if ($fields['sku'] !== $product->sku) {
                $slugValidation = $this->validateUniqueSlug($fields['sku']);
            }

            $result = [
                parent::validate($fields),
                $this->validatePrice($fields['price'], $fields['price_sale']),
                $slugValidation
            ];
        }

        return !in_array(false, $result);
    }

    public function validateUniqueSlug(string $slug): bool
    {
        $result = !(bool)Product::select()
            ->where('slug', '=', $slug)
            ->get();
        if (!$result) {
            $this->setError(
                'slug',
                'Slug was exist'
            );
        }

        return $result;
    }

    public function validateUniqueSku(string $slug): bool
    {
        $result = !(bool)Product::select()
            ->where('sku', '=', $slug)
            ->get();
        if (!$result) {
            $this->setError(
                'sku',
                'SKU was exist'
            );
        }

        return $result;
    }

    public function validatePrice(float $price, float $salePrice): bool
    {
        if ($salePrice < 0.01) {
            return true;
        }
        if ($salePrice > $price) {
            $this->setError('price_sale', 'The discount price must be less than the basic price');
            return false;
        }
        return true;
    }
}
