<?php

use Homeandriy\Ithillel\AbstractFactory\Classes\Company\LGTVFactory;
use Homeandriy\Ithillel\AbstractFactory\Classes\Company\SonyTVFactory;

require 'vendor/autoload.php';

const LG_COMPANY = 'LG';
const SONY_COMPANY = 'LG';
const LCD_TV_TYPE = 'LCD';
const LED_TV_TYPE = 'LED';
const EDGE_LED = 'EDGE_LED';
const EDGE_LED_FULL = 'EDGE_LED_FULL';


function makeLGTV(LGTVFactory $LGTVFactory): void
{
    echo $LGTVFactory->makeLCDTV()->create() . '<br>';
    echo $LGTVFactory->makeLedTV(500)->create() . '<br>';
}

function makeSonyTV(SonyTVFactory $sonyTVFactory): void
{
    echo $sonyTVFactory->makeLCDTV()->create() . '<br>';
    echo $sonyTVFactory->makeLedTV(1200)->create() . '<br>';
}


makeLGTV(new LGTVFactory());
makeSonyTV(new SonyTVFactory());


