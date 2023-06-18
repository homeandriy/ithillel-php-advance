<?php

namespace App\Models;

use Core\Model;

class Category extends Model
{
    protected static string|null $tableName = 'category';
    public string $name,
        $description,
        $create_at,
        $update_at,
        $slug;
    public ?string $image;
    public function products()
    {
        return Product::findByCollection('category_id', $this->id);
    }
}
