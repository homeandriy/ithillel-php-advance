<?php

namespace Homeandriy\Ithillel\Repository;

use Homeandriy\Ithillel\Models\Model;
use Homeandriy\Ithillel\Models\Product;

class ProductRepository implements Repository
{
    public function __construct(
        protected Model $product
    ) {
    }

    public function save(): void
    {
        echo 'The product ' . $this->product->get(Product::NAME) . ' was saved<br><br>';
    }

    public function update(): void
    {
        echo 'The product ' . $this->product->get(Product::NAME) . ' was updated<br><br>';
    }

    public function delete(): void
    {
        echo 'The product ' . $this->product->get(Product::NAME) . ' was deleted<br><br>';
    }
}