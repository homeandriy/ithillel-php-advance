<?php

use Core\Router;

// product/4/edit
Router::add(
    'product/{id:\d+}/edit',
    [
        'controller' => \App\Controllers\ProductController::class,
        'action' => 'edit',
        'method' => 'GET'
    ]
);
