<?php

namespace App\Services;

use App\Models\Product;

class CartService
{
    public static function add(Product $product, int $amount = 1): array
    {
        $cart = static::getCart();
        if (static::hasProduct($product)) {
            $cart[$product->id]->amount = $cart[$product->id]->amount + $amount;
            return $_SESSION['cart'];
        }
        $cart[$product->id] = $product;
        $cart[$product->id]->amount = $amount;
        $_SESSION['cart'] = $cart;
        return $_SESSION['cart'];
    }

    public static function reduce(Product $product, int $amount = 1)
    {
        $cart = static::getCart();
        if (static::hasProduct($product)) {
            $newAmount = $cart[$product->id]->amount - $amount;
            if ($newAmount < 1) {
                return static::remove($product);
            }
            $cart[$product->id]->amount = $newAmount;
        }

        $_SESSION['cart'] = $cart;
        return $_SESSION['cart'];
    }

    public static function remove(Product $product): array
    {
        $cart = static::getCart();
        if (static::hasProduct($product)) {
            unset($cart[$product->id]);
        }
        $_SESSION['cart'] = $cart;
        return $_SESSION['cart'];
    }

    public static function getCart(): array
    {
        return $_SESSION['cart'] ?? [];
    }

    public static function clearCart(): void
    {
        unset($_SESSION['cart']);
    }

    protected static function hasProduct(Product $product): bool
    {
        $cart = static::getCart();
        return isset($cart[$product->id]);
    }

    public static function amount()
    {
        return count(static::getCart());
    }

    public static function sum(): float|int
    {
        $cart = static::getCart();
        if (empty($cart)) {
            return 0;
        }
        $sum = 0;
        foreach ($cart as $product) {
            /** @var Product $product */
            $price = $product->price();

            $sum += $price * $product->amount;
        }

        return $sum;
    }
}
