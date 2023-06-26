<?php

namespace App\Models;

use Core\Model;

class Product extends Model
{
    protected static string|null $tableName = 'products';
    public string $name, $description, $create_at, $slug, $sku, $update_at;
    public ?string $image;
    public int $is_active, $category_id;
    public float $price, $price_sale;


    public function category(): Category
    {
        return Category::find($this->category_id);
    }
}
