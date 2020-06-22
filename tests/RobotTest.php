<?php

use PHPUnit\Framework\TestCase;

class RobotTest extends TestCase
{
    public function testChargeforBatteryFull(){
        $robot = new Robot();
        $this->assertEquals(NULL, $robot->charge());
    }

    public function testCleanUpForBatteryNotDied(){
        $robot = new Robot();
        $startAt = 1;
        $endAt = 10;
        $this->assertEquals($endAt, $robot->cleanUp($startAt, $endAt));
    }

    public function testCleanUpForBatteryisDied(){
        $robot = new Robot();
        $startAt = 1;
        $endAt = 100;
        $reflection = new ReflectionClass($robot);
        $reflection_property = $reflection->getProperty('capacity');
        $reflection_property->setAccessible(true);
        $reflection_property->setValue($robot, 10);
        $time = Clock::now();
           
        $this->assertNotEquals($endAt, $robot->cleanUp($startAt, $endAt));
    }
}