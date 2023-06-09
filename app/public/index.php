<?php

require './../vendor/autoload.php';

use App\Models\Order;
use App\Models\Product;

require_once dirname(__DIR__) . '/Config/constants.php';
require_once BASE_DIR . '/vendor/autoload.php';

try {
    if (!session_id()) {
        session_start();
    }

    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(BASE_DIR);
    $dotenv->load();

    $product = Product::find(2);

    d($product);
    d($product->category());
    d($product->category()->products());

    $order_id = Order::create(
        [
            'session_id' => session_id(),
            'address' => 'м. Вінниця, вулиця Івана Богуна 25 / квартира 13',
            'sum' => 250.30,
            'user_id' => 1,
        ]
    );
    d(['Insert id', $order_id]);
    $order = Order::find($order_id);
    $order->addProduct($product);
    d($order->products());
    $user = $order->user();

    d($user);

    d($user->orders());
} catch (PDOException $exception) {
    dd("PDOException", $exception->getMessage());
} catch (Exception $exception) {
    dd("Exception", $exception->getMessage());
}
