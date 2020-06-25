<?php

use PHPUnit\Framework\TestCase;

class BatteryTest extends TestCase{

    function setUp(){
        $this->battery = new Battery();
        // Suppress  output to console
        $this->setOutputCallback(function() {});
    }

    function testInitailizeBatteryPower(){
        $this->assertEquals(BATTERY_MAX_LIMIT, $this->battery->getPower());
    }

    public function testChargeforBatteryFull(){
        $this->assertEquals(NULL, $this->battery->charge());
    }

    function testConsumeForPowerIsGreaterThanConsumePower(){
        $reflection = new ReflectionClass($this->battery);
        $reflection_property = $reflection->getProperty('power');
        $reflection_property = $reflection->getProperty('consumePower');
        $reflection_property->setAccessible(true);
        $reflection_property->setValue($this->battery, 100);
        $reflection_property->setValue($this->battery, 1.67);
        $this->battery->consume();

        $this->assertEquals((100-1.67), $this->battery->getPower());
    }

    function testConsumeForPowerIsLessThanConsumePower(){
        $reflection = new ReflectionClass($this->battery);
        $reflection_property = $reflection->getProperty('power');
        $reflection_property->setAccessible(true);
        $reflection_property->setValue($this->battery, -1);
        
        $this->expectException(Exception::class);
        $this->expectExceptionMessage = "consumePower can not be exceed to power!";
        $this->battery->consume();
    }
}