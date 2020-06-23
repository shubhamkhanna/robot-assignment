<?php

define("BATTERY_MAX_LIMIT", 100, true);

class Battery{
    public $power;
    
    function __construct(){
        $this->power = BATTERY_MAX_LIMIT;
    }

}