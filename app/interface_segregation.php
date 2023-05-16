<?php

use Homeandriy\Ithillel\Models\Ostrich;
use Homeandriy\Ithillel\Models\Swallow;
use Homeandriy\Ithillel\Service\Eat\BreadCrumbs;
use Homeandriy\Ithillel\Service\Eat\Grain;

$instanceGrain       = new Grain();
$instanceBreadCrumbs = new BreadCrumbs();

$instanceSwallow = new Swallow();
$instanceOstrich = new Ostrich();

$instanceSwallow->eat($instanceGrain);
echo 'Swallow was eat grain and now get calories: ' . $instanceSwallow->getCalories() . '<br>';

$instanceSwallow->eat($instanceBreadCrumbs);
echo 'Swallow was eat grain and bread crumbs and now get calories: ' . $instanceSwallow->getCalories() . '<br>';

$instanceSwallow->fly();

echo '<br>';
echo '<br>';
echo '<br>';

$instanceOstrich->eat($instanceGrain);
echo 'Ostrich was eat grain crumbs and now get calories: ' . $instanceOstrich->getCalories() . '<br>';