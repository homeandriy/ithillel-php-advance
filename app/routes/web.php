<?php

use Core\Router;

Router::add(
    '',
    [
        'controller' => \App\Controllers\IndexController::class,
        'action' => 'index',
        'method' => 'GET'
    ]
);

// product/4/edit
Router::add(
    'product/{id:\d+}/edit',
    [
        'controller' => \App\Controllers\ProductController::class,
        'action' => 'edit',
        'method' => 'GET'
    ]
);
Router::add(
    'login',
    [
        'controller' => \App\Controllers\AuthController::class,
        'action' => 'login',
        'method' => 'GET'
    ]
);
Router::add(
    'logout',
    [
        'controller' => \App\Controllers\AuthController::class,
        'action' => 'logout',
        'method' => 'POST'
    ]
);
Router::add(
    'register',
    [
        'controller' => \App\Controllers\AuthController::class,
        'action' => 'register',
        'method' => 'GET'
    ]
);
Router::add(
    'auth/signup',
    [
        'controller' => \App\Controllers\AuthController::class,
        'action' => 'signup',
        'method' => 'POST'
    ]
);
Router::add(
    'auth/verify',
    [
        'controller' => \App\Controllers\AuthController::class,
        'action' => 'verify',
        'method' => 'POST'
    ]
);
