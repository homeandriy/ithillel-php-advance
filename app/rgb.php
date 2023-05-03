<?php

//Homework 2
// Color instance
use Homeandriy\Ithillel\Services\Color;

$colorInstanceOne = new Color(50, 30, 140);
echo '<h2>Only instance</h2>';
echo $colorInstanceOne->getRed() . '<br>';
echo $colorInstanceOne->getGreen() . '<br>';
echo $colorInstanceOne->getBlue() . '<br>';
echo '---------------------------------------------------------------------';
//dd($colorInstance);

// MIX color
$colorInstanceOne->mix(new Color(0, 70, 60));
echo '<h2>Mix instance</h2>';
echo $colorInstanceOne->getRed() . '<br>';
echo $colorInstanceOne->getGreen() . '<br>';
echo $colorInstanceOne->getBlue() . '<br>';
echo '---------------------------------------------------------------------';
//    dd($colorInstanceOne);

// Random
$colorRandom = Color::random();
echo '<h2>Random</h2>';
echo $colorRandom->getRed() . '<br>';
echo $colorRandom->getGreen() . '<br>';
echo $colorRandom->getBlue() . '<br>';
echo '---------------------------------------------------------------------';
//    dd($colorRandom);

// Equals
$result = $colorRandom->equals(Color::random());
echo '<h2>Equals 1</h2>';
var_dump($result);
echo '<br>';
echo '---------------------------------------------------------------------';
//    dd($result);

// Equals
$result = $colorInstanceOne->equals(new Color(25, 50, 100));;
echo '<h2>Equals 2</h2>';
var_dump($result);
echo '<br>';
echo '---------------------------------------------------------------------';
//    dd($result);

// Error color
$colorInstanceError = new Color(280, 1050, 10);