<?php

require './../vendor/autoload.php';

use App\Models\Order;
use App\Models\Product;
use App\Models\User;

require_once dirname(__DIR__) . '/Config/constants.php';
require_once BASE_DIR . '/vendor/autoload.php';

try {
    if (!session_id()) {
        session_start();
    }

    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(BASE_DIR);
    $dotenv->load();

    $product = Product::find(1);
    d($product);
    d($product->category());

    $user = new User();
    $user->password = 'secret_user_test25';
    $user->update(['email' => 'loc@test.com']);

    $order = new Order();
    $order->session_id = session_id();
    $order->address = 'м. Вінниця, вулиця Івана Богуна 25 / квартира 13';
    $order->sum = 250.30;
    $order->user_id = 1;
    $order_id = $order->insert();
    d(['Insert id', $order_id]);
    $order->id = $order_id;

    $order->addProduct($product);
    d($order->products());
} catch (PDOException $exception) {
    dd("PDOException", $exception->getMessage());
} catch (Exception $exception) {
    dd("Exception", $exception->getMessage());
}
