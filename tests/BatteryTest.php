<?php

use PHPUnit\Framework\TestCase;

class BatteryTest extends TestCase{

    function testInitailizeBatteryPower(){
        $battery = new Battery();
        
        $this->assertEquals(BATTERY_MAX_LIMIT, $battery->power);
    }
}