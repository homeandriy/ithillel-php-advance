<?php

namespace App\Models;

use Core\Model;

class Category extends Model
{
    public ?int $id;
    protected static string|null $tableName = 'category';
    public string $name,
        $description,
        $create_at,
        $update_at,
        $slug,
        $image;
    public function products()
    {
        return Product::findBy('category_id', $this->id);
    }
}
