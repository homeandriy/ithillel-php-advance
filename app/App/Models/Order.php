<?php

namespace App\Models;

use Core\DB;
use Core\Model;
use PDO;

class Order extends Model
{
    public ?int $id;
    protected static string|null $tableName = 'orders';
    public $session_id,
        $user_id,
        $sum,
        $address;

    public function addProduct(Product $product)
    {
        $query = Db::connect()->prepare("INSERT INTO orders_prods ( order_id, product_id) VALUES( :order_id, :product_id)");
        $query->bindValue(':order_id', $this->id);
        $query->bindValue(':product_id', $product->id);

        $query->execute();
    }

    public function products()
    {
        // Поки сирий запит, в майбутньому пернести в окремий Query Builder
        $query = Db::connect()->prepare("SELECT * FROM products WHERE id IN(SELECT product_id FROM orders_prods WHERE order_id = :order_id)");
        $query->bindValue(':order_id', $this->id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, Product::class);
    }
}
