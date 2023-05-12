<?php

use Homeandriy\Ithillel\Models\Product;
use Homeandriy\Ithillel\Repository\ProductRepository;
use Homeandriy\Ithillel\Utils\ProductViewer;

$productInstance = new Product();
$productInstance->set(Product::NAME, 'Banana');
$productInstance->set('price', 30.20);
$productInstance->set('brand', 'ithillel');
$productInstance->set(
    'relatives',
    [
        [Product::NAME => 'Orange'],
        [Product::NAME => 'Cucumber'],
    ]
);

echo $productInstance->get(Product::NAME) . '<br>';

$productRepositoryInstance = new ProductRepository($productInstance);

$productRepositoryInstance->save();
$productRepositoryInstance->update();
$productRepositoryInstance->delete();

$productViewerInstance = new ProductViewer($productInstance);
$productViewerInstance->show();
echo $productViewerInstance->print();