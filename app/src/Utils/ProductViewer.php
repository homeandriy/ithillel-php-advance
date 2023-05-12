<?php

namespace Homeandriy\Ithillel\Utils;

use Homeandriy\Ithillel\Models\Product;

class ProductViewer // maybe implements interface
{
    public function __construct(private readonly Product $product)
    {
    }

    /**
     * Pretty show
     *
     * @return void
     */
    public function show(): void
    {
        ob_start();
        echo '<h1>Show all Properties:</h1>';
        foreach ($this->product->list() as $propertyName => $propertyValue) {
            echo '<h2 style="color: blue"> Property name : ' . $propertyName . '</h2>';
            echo '<h2 style="color: orangered"> Property Value : </h2>';
            echo '<pre>';
            print_r($propertyValue);
            echo '<pre>';
            echo '<br><hr><br>';
        }
        echo '<pre>';

        echo ob_get_clean();
    }

    /**
     * Return print_r formatted string
     *
     * @return string
     */
    public function print(): string
    {
        ob_start();
        echo '<pre>';
        print_r($this->product->list());
        echo '<pre>';

        return ob_get_clean();
    }
