<?php

use PHPUnit\Framework\TestCase;
use Mockery\Adapter\Phpunit\MockeryTestCase;

class RobotTest extends MockeryTestCase
{
    function setUp(){
        $this->robot = new Robot("clean", new Battery());
        // Suppress  output to console
        $this->setOutputCallback(function() {});
    }
    
    public function testChargeforBatteryFull(){
        $this->assertEquals(NULL, $this->robot->charge());
    }

    public function testCleanUpForBatteryNotDied(){
        $startAt = 1;
        $endAt = 2;

        $this->assertEquals($endAt, $this->robot->cleanUp($startAt, $endAt));
    }

    public function testCleanUpForBatteryisDied(){
        $startAt = 1;
        $endAt = 3;
        $reflection = new ReflectionClass($this->robot);
        $reflection_property = $reflection->getProperty('capacity');
        $reflection_property->setAccessible(true);
        $reflection_property->setValue($this->robot, 100);
           
        $this->assertNotEquals($endAt, $this->robot->cleanUp($startAt, $endAt));
    }

    public function testCleanUpForBatteryUsingMockery(){
        $startAt = 1;
        $endAt = 3;
        $reflection = new ReflectionClass($this->robot);
        $reflection_property = $reflection->getProperty('capacity');
        $reflection_property->setAccessible(true);
        $reflection_property->setValue($this->robot, 100);

        $robotMock = Mockery::mock('robo');
        $robotMock->shouldReceive("cleanUp")
                  -> once()
                  -> with($startAt, $endAt)
                  -> andReturn(2);  
           
        $this->assertNotEquals($endAt, $robotMock->cleanUp($startAt, $endAt));
    }
}