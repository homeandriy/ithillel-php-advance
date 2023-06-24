<?php

namespace App\Validators;

use App\Models\Category;
use App\Validators\Base\BaseValidator;

class CategoryValidator extends Base\BaseValidator
{
    protected array $rules = [
        'name' => '/.{2,255}$/i',
        'description' => '/.+$/i',
        'slug' => '/.+$/i',
    ];

    protected array $errors = [
        'name' => 'Title should be more then 3 symbols but less then 255',
        'description' => 'Content should be more then 1 symbol',
        'slug' => 'Content should be more then 1 symbol'
    ];

    public function validate(array $fields = [], string $type = self::TYPE_INSERT,): bool
    {
        $result = [];
        if ($type === BaseValidator::TYPE_INSERT) {
            $result = [
                parent::validate($fields),
                $this->validateUniqueSlug($fields['slug'])
            ];
        }
        if ($type === BaseValidator::TYPE_UPDATE) {
            /** @var Category $category */
            $category = Category::find($fields['id']);
            if (!$category) {
                $this->setError('id', 'Category not found');
            }
            $slugValidation = true;
            if ($fields['slug'] !== $category->slug) {
                $slugValidation = $this->validateUniqueSlug($fields['slug']);
            }

            $result = [
                parent::validate($fields),
                $slugValidation
            ];
        }

        return !in_array(false, $result);
    }

    public function validateUniqueSlug(string $slug): bool
    {
        $result = !(bool)Category::select()
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
}
