<?php

namespace App\Models;

use Core\DB;
use Core\Model;
use PDO;

class Order extends Model
{
    public const ORDER_CREATED = 'created';
    public const ORDER_SUCCESS = 'success';
    public const ORDER_REJECT = 'reject';
    public const ORDER_STATUS_LIST = [
        self::ORDER_CREATED => 'Створено',
        self::ORDER_SUCCESS => 'Виконано',
        self::ORDER_REJECT => 'Відхилено',
    ];
    /**
     * @var Product[]
     */
    protected ?array $_products = null;
    protected static string|null $tableName = 'orders';
    public string $session_id, $address, $status, $create_at, $update_at;
    public int $user_id;
    public float $sum;

    /**
     * @param Product $product
     * @param int $amount
     *
     * @return void
     */
    public function addProduct(Product $product, int $amount) : void
    {
        $this::create(
            [
                'order_id' => $this->id,
                'product_id' => $product->id,
                'amount' => $amount
            ],
            'orders_prods'
        );
    }

    public function products(): array
    {
        if (!$this->_products) {
            $this->_products = [];
            $query = Db::connect()->prepare("
                    SELECT p.*, op.amount
                        FROM `products` as p 
                        LEFT JOIN orders_prods as op ON op.product_id = p.id AND op.order_id = :order_id
                        WHERE p.id IN (
                            SELECT product_id FROM orders_prods WHERE order_id = :order_id
                        )");
            $query->bindValue(':order_id', $this->id);
            $query->execute();
            $this->_products = $query->fetchAll(PDO::FETCH_CLASS, Product::class);
        }
        return $this->_products;
    }

    public function findOrderBySession()
    {
        return Order::findBy('session_id', session_id());
    }

    public function user()
    {
        return User::find($this->user_id);
    }

    public static function sumNewOrder(): float
    {
        $orders = Order::findByCollection('status', Order::ORDER_CREATED);
        $sum = 0;
        if (empty($orders)) {
            return 0;
        }
        array_walk($orders, function (Order $order) use (&$sum) {
            $sum += $order->sum;
        });
        return $sum;
    }
}
