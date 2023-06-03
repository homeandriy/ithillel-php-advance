<?php

namespace App\Models;

use Core\Model;

class Product extends Model
{
    public ?int $id;
    protected static array $hasOne = [Category::class];

    protected static string|null $tableName= 'products';

    public function category(): Category {
        return Category::find($this->id);
    }
}
