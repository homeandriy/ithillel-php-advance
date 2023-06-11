<?php

namespace App\Models;

use Core\Model;

class Product extends Model
{
    protected static string|null $tableName = 'products';
    public $name,
        $description,
        $create_at,
        $price,
        $price_sale,
        $slug,
        $sku,
        $is_active,
        $image,
        $update_at;


    public function category(): Category
    {
        return Category::find($this->id);
    }
}
