<?php

use Config\Config;
use JetBrains\PhpStorm\NoReturn;

function config(string $name): string|null
{
    return Config::get($name);
}

function view(string $view, array $args = [])
{
    \Core\View::render($view, $args);
}

function url(string $path = ''): string
{
    $path = ltrim($path, '/');
    return SITE_URL . '/' . $path;
}

function urlBack(): string
{
    return $_SERVER['HTTP_REFERER'] ?? url();
}

function currentLink(string $path): bool
{
    return trim($_SERVER['REQUEST_URI'], '/') === $path;
}

#[NoReturn]
function redirect(string $path = ''): void
{
    $path = ltrim($path, '/');

    header('Location: ' . url($path));
    exit;
}

function redirectBack(string $path = ''): void
{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

function showInputError(string $key, array $errors = []): string
{
    return !empty($errors[$key])
        ? sprintf('<div class="mb-3 alert alert-danger" role="alert">%s</div>', $errors[$key])
        : '';
}

function notify()
{
    if (!empty($_SESSION['notify'])) {
        $template = '<div class="alert alert-%s" role="alert">%s</div>';
        echo sprintf($template, $_SESSION['notify']['type'], $_SESSION['notify']['message']);
        \App\Helpers\Session::flushNotify();
    }
}

function formInputHelper(string $field, array $fields): string
{
    return $fields[$field] ?? '';
}

function getModelName(\Core\Model $instance, string $default = ''): string
{
    if (!empty($default)) {
        return mb_strtolower($default);
    }
    return mb_strtolower((new \ReflectionClass($instance))->getShortName());
}

function orderStatusHelper(string $status): string
{
    switch ($status) {
        case \App\Models\Order::ORDER_CREATED:
        {
            $badge = '<span class="badge bg-primary">Створено</span>';
            break;
        }
        case \App\Models\Order::ORDER_SUCCESS:
        {
            $badge = '<span class="badge bg-success">Успішно виконано</span>';
            break;
        }
        case \App\Models\Order::ORDER_REJECT:
        {
            $badge = '<span class="badge bg-warning">Відхилено</span>';
            break;
        }
        default :
        {
            $badge = '<span class="badge bg-danger">Невідомий статус</span>';
        }
    }
    return $badge;
}

function userStatus(int $status) : string
{
    switch ($status) {
        case \App\Models\User::USER_ADMIN:
        {
            $badge = '<span class="badge bg-primary">'.\App\Models\User::USER_STATUS_LIST[\App\Models\User::USER_ADMIN].'</span>';
            break;
        }
        case \App\Models\User::USER_CLIENT:
        {
            $badge = '<span class="badge bg-success">'.\App\Models\User::USER_STATUS_LIST[\App\Models\User::USER_CLIENT].'</span>';
            break;
        }
        default :
        {
            $badge = '<span class="badge bg-danger">Невідомий статус</span>';
        }
    }
    return $badge;
}

function displayPrice(\App\Models\Product $product, bool $onlyDalePrice = false) {
    if($product->price_sale > 0.01 && $product->price_sale < $product->price) {
        return $onlyDalePrice ?
            sprintf(' <h5>%s ₴</h5>', $product->price_sale):
            sprintf('<div class="product__item__price">%s ₴<span>%s ₴</span></div>', $product->price_sale, $product->price);
    } else {
        return sprintf(' <h5>%s ₴</h5>', $product->price);
    }
}
