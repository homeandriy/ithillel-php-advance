<?php
/**
 * Homework 3
 * Trait
 */

use Homeandriy\Ithillel\Services\Test;

try {
    $testInstance = new Test();

    echo "<h2 style='color: blueviolet'> Sum trait methods: " . $testInstance->sum() . "</h2>";

} catch (Exception $exception) {
    echo $exception->getMessage();
    echo '<br>';
    echo $exception->getTraceAsString();
}