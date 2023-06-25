<?php

use Core\Router;

Router::add(
    '',
    [
        'controller' => \App\Controllers\IndexController::class,
        'action' => 'index',
        'method' => Router::GET
    ]
);

Router::add(
    'login',
    [
        'controller' => \App\Controllers\AuthController::class,
        'action' => 'login',
        'method' => Router::GET
    ]
);
Router::add(
    'logout',
    [
        'controller' => \App\Controllers\AuthController::class,
        'action' => 'logout',
        'method' => Router::POST
    ]
);
Router::add(
    'register',
    [
        'controller' => \App\Controllers\AuthController::class,
        'action' => 'register',
        'method' => Router::GET
    ]
);
Router::add(
    'auth/signup',
    [
        'controller' => \App\Controllers\AuthController::class,
        'action' => 'signup',
        'method' => Router::POST
    ]
);
Router::add(
    'auth/verify',
    [
        'controller' => \App\Controllers\AuthController::class,
        'action' => 'verify',
        'method' => Router::POST
    ]
);
Router::add(
    'admin',
    [
        'controller' => \App\Controllers\DashboardController::class,
        'action' => 'index',
        'method' => Router::GET
    ]
);
Router::add(
    'admin/dashboard',
    [
        'controller' => \App\Controllers\DashboardController::class,
        'action' => 'index',
        'method' => Router::GET
    ]
);

// Shop
Router::add(
    'shop',
    [
        'controller' => \App\Controllers\ShopController::class,
        'action' => 'index',
        'method' => Router::GET
    ]
);
Router::add(
    'shop/cart',
    [
        'controller' => \App\Controllers\ShopController::class,
        'action' => 'cart',
        'method' => Router::GET
    ]
);
Router::add(
    'shop/cart/ajax',
    [
        'controller' => \App\Controllers\ShopController::class,
        'action' => 'cart',
        'method' => Router::POST
    ]
);

Router::add(
    'shop/cart/add',
    [
        'controller' => \App\Controllers\ShopController::class,
        'action' => 'add',
        'method' => Router::POST
    ]
);
Router::add(
    'shop/cart/reduce',
    [
        'controller' => \App\Controllers\ShopController::class,
        'action' => 'reduce',
        'method' => Router::POST
    ]
);
Router::add(
    'shop/cart/remove',
    [
        'controller' => \App\Controllers\ShopController::class,
        'action' => 'remove',
        'method' => Router::POST
    ]
);

Router::add(
    'shop/checkout',
    [
        'controller' => \App\Controllers\ShopController::class,
        'action' => 'checkout',
        'method' => Router::GET
    ]
);
Router::add(
    'shop/checkout/processing',
    [
        'controller' => \App\Controllers\ShopController::class,
        'action' => 'checkoutProcessing',
        'method' => Router::POST
    ]
);
Router::add(
    'shop/thanks/{id:\d+}',
    [
        'controller' => \App\Controllers\ShopController::class,
        'action' => 'thanks',
        'method' => Router::GET
    ]
);
Router::add(
    'shop/search',
    [
        'controller' => \App\Controllers\ShopController::class,
        'action' => 'search',
        'method' => Router::GET
    ]
);

Router::add(
    'shop/product/{slug:.+}',
    [
        'controller' => \App\Controllers\ShopController::class,
        'action' => 'show',
        'method' => Router::GET
    ]
);
Router::add(
    'shop/category/{slug:\D+}',
    [
        'controller' => \App\Controllers\ShopController::class,
        'action' => 'category',
        'method' => Router::GET
    ]
);

// Products
Router::add(
    'admin/products',
    [
        'controller' => \App\Controllers\ProductController::class,
        'action' => 'index',
        'method' => Router::GET
    ]
);
Router::add(
    'admin/product/{id:\d+}/show',
    [
        'controller' => \App\Controllers\ProductController::class,
        'action' => 'show',
        'method' => Router::GET
    ]
);
Router::add(
    'admin/product/{id:\d+}/edit',
    [
        'controller' => \App\Controllers\ProductController::class,
        'action' => 'edit',
        'method' => Router::GET
    ]
);
Router::add(
    'admin/product/{id:\d+}/update',
    [
        'controller' => \App\Controllers\ProductController::class,
        'action' => 'update',
        'method' => Router::POST
    ]
);
Router::add(
    'admin/product/create',
    [
        'controller' => \App\Controllers\ProductController::class,
        'action' => 'create',
        'method' => Router::GET
    ]
);
Router::add(
    'admin/product/store',
    [
        'controller' => \App\Controllers\ProductController::class,
        'action' => 'store',
        'method' => Router::POST
    ]
);
Router::add(
    'admin/product/{id:\d+}/destroy',
    [
        'controller' => \App\Controllers\ProductController::class,
        'action' => 'destroy',
        'method' => Router::POST
    ]
);
// Category
Router::add(
    'admin/categories',
    [
        'controller' => \App\Controllers\CategoryController::class,
        'action' => 'index',
        'method' => Router::GET
    ]
);
Router::add(
    'admin/category/{id:\d+}/show',
    [
        'controller' => \App\Controllers\CategoryController::class,
        'action' => 'show',
        'method' => Router::GET
    ]
);
Router::add(
    'admin/category/{id:\d+}/edit',
    [
        'controller' => \App\Controllers\CategoryController::class,
        'action' => 'edit',
        'method' => Router::GET
    ]
);
Router::add(
    'admin/category/{id:\d+}/update',
    [
        'controller' => \App\Controllers\CategoryController::class,
        'action' => 'update',
        'method' => Router::POST
    ]
);
Router::add(
    'admin/category/create',
    [
        'controller' => \App\Controllers\CategoryController::class,
        'action' => 'create',
        'method' => Router::GET
    ]
);
Router::add(
    'admin/category/store',
    [
        'controller' => \App\Controllers\CategoryController::class,
        'action' => 'store',
        'method' => Router::POST
    ]
);
Router::add(
    'admin/category/{id:\d+}/destroy',
    [
        'controller' => \App\Controllers\CategoryController::class,
        'action' => 'destroy',
        'method' => Router::POST
    ]
);
// Orders
Router::add(
    'admin/orders',
    [
        'controller' => \App\Controllers\OrdersController::class,
        'action' => 'index',
        'method' => Router::GET
    ]
);
Router::add(
    'admin/order/{id:\d+}/show',
    [
        'controller' => \App\Controllers\OrdersController::class,
        'action' => 'show',
        'method' => Router::GET
    ]
);

Router::add(
    'admin/order/{id:\d+}/edit',
    [
        'controller' => \App\Controllers\OrdersController::class,
        'action' => 'edit',
        'method' => Router::GET
    ]
);
Router::add(
    'admin/order/{id:\d+}/update',
    [
        'controller' => \App\Controllers\OrdersController::class,
        'action' => 'update',
        'method' => Router::POST
    ]
);
// User
Router::add(
    'admin/users',
    [
        'controller' => \App\Controllers\UserController::class,
        'action' => 'index',
        'method' => Router::GET
    ]
);
Router::add(
    'admin/user/{id:\d+}/show',
    [
        'controller' => \App\Controllers\UserController::class,
        'action' => 'show',
        'method' => Router::GET
    ]
);
Router::add(
    'admin/user/{id:\d+}/edit',
    [
        'controller' => \App\Controllers\UserController::class,
        'action' => 'edit',
        'method' => Router::GET
    ]
);
Router::add(
    'admin/user/{id:\d+}/update',
    [
        'controller' => \App\Controllers\UserController::class,
        'action' => 'update',
        'method' => Router::POST
    ]
);
Router::add(
    'admin/user/create',
    [
        'controller' => \App\Controllers\UserController::class,
        'action' => 'create',
        'method' => Router::GET
    ]
);
Router::add(
    'admin/user/store',
    [
        'controller' => \App\Controllers\UserController::class,
        'action' => 'store',
        'method' => Router::POST
    ]
);
Router::add(
    'admin/{id:\d+}/destroy',
    [
        'controller' => \App\Controllers\UserController::class,
        'action' => 'destroy',
        'method' => Router::POST
    ]
);
// Contact
Router::add(
    'contacts',
    [
        'controller' => \App\Controllers\IndexController::class,
        'action' => 'contacts',
        'method' => Router::GET
    ]
);
