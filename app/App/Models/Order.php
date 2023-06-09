<?php

namespace App\Models;

use Core\DB;
use Core\Model;
use PDO;

class Order extends Model
{
    protected static string|null $tableName = 'orders';
    public $session_id,
        $user_id,
        $sum,
        $address;

    public function addProduct(Product $product)
    {
        $this::create(
            [
                'order_id' => $this->id,
                'product_id' => $product->id
            ],
            'orders_prods'
        );
    }

    public function products()
    {
        $query = Db::connect()->prepare("SELECT * FROM products WHERE id IN(SELECT product_id FROM orders_prods WHERE order_id = :order_id)");
        $query->bindValue(':order_id', $this->id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, Product::class);
    }
    public function findOrderBySession()
    {
        return Order::findBy('session_id', session_id());
    }
    public function user() {
        return User::find($this->user_id);
    }
}
