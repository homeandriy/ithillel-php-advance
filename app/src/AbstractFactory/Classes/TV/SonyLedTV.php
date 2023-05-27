<?php

namespace Homeandriy\Ithillel\AbstractFactory\Classes\TV;

class SonyLedTV extends AbstractLEDTV
{

    private static string $ledOrientation = EDGE_LED;
    protected string $company = SONY_COMPANY;

    public function __construct(int $numberOfLEDs)
    {
        $this->numberOfLEDs = $numberOfLEDs;
        $this->company = SONY_COMPANY;
        $this->type = LED_TV_TYPE;

        if (3000 > $this->numberOfLEDs) {
            $this->maximumBrightness = 1500;
            self::$ledOrientation = EDGE_LED;
        } else {
            $this->maximumBrightness = 1650;
            self::$ledOrientation = EDGE_LED_FULL;
        }
    }

    public function create(): string
    {
        return '<h2>Return method:<strong>' . __METHOD__ . '</strong> Of <strong>' . __CLASS__ . '</strong>. 
            <h2>
            Create Company: ' . $this->company . '<br> 
            TV TYPE: ' . $this->type . ' <br> 
            Maximum Brightness : ' . $this->maximumBrightness . '<br>  
            Orientation: ' . self::$ledOrientation . '<br> 
            Number of LEDs: ' . $this->numberOfLEDs . '</h2>';
    }
}