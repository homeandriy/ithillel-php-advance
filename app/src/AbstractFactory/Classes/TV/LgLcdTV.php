<?php

namespace Homeandriy\Ithillel\AbstractFactory\Classes\TV;

class LgLcdTV extends BaseAbstractTV
{
    protected string $company = LG_COMPANY;
    protected string $type = LCD_TV_TYPE;

    public function create(): string
    {
        return '<h2>Return method <strong>' . __METHOD__ . '</strong> Of <strong>' . __CLASS__ . '</strong>. 
            <h2>Create Company: ' . $this->company . '<br> TV TYPE: ' . $this->type . ' <br> Maximum Brightness : ' . $this->maximumBrightness . '</h2>';
    }
}