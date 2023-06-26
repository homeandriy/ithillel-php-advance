<?php

namespace App\Services;

use App\Models\Category;
use App\Validators\Base\BaseValidator;

class CategoryService
{
    public static function create(BaseValidator $validator, array $fields = []): bool
    {
        if (!$validator->validate($fields)) {
            return false;
        }

        return Category::create($fields);
    }

    public static function update(BaseValidator $validator, array $fields = []): bool
    {
        if (!$validator->validate($fields, BaseValidator::TYPE_UPDATE)) {
            return false;
        }

        $category = Category::find($fields['id']);
        return $category->update($fields);
    }

    public static function destroy(int $categoryId): bool
    {
        $category = Category::find($categoryId);
        return $category->destroy();
    }
}
