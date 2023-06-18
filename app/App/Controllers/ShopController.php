<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Product;

class ShopController extends \Core\Controller
{
    public function index(): void
    {
        view('shop/main', ['products' => Product::all()]);
    }

    public function show(string $slug): void
    {
        view('shop/product', [
                'product' => Product::findBy('slug', $slug),
                'related' => Product::all()
            ]
        );
    }
    public function category(string $slug):void
    {
        $category = Category::findBy('slug', $slug);
        if(!$category instanceof Category) {
            redirect('/shop');
        }
        view(
            'shop/main',
            [
                'products' => Product::findByCollection('category_id', $category->id),
                'category' => $category
            ]
        );
    }
}
