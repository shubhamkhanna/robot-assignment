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
    
    public function testCleanUpForBatteryNotDied(){
        $startAt = 1;
        $endAt = 2;

        $this->assertEquals($endAt, $this->robot->cleanUp($startAt, $endAt));
    }

    public function testCleanUpForBatteryisDied(){
        $startAt = 1;
        $endAt = 3;
        $this->robot->setCapacity(100);
           
        $this->assertNotEquals($endAt, $this->robot->cleanUp($startAt, $endAt));
    }

    public function testGetAction(){
        $reflection = new ReflectionClass($this->robot);
        $reflection_property = $reflection->getProperty('action');
        $reflection_property->setAccessible(true);
        $reflection_property->setValue($this->robot, "clean");

        $this->assertEquals("clean", $this->robot->getAction());
    }

    public function testsetCapacity(){
        $battery = new Battery();
        $reflection = new ReflectionClass($this->robot);
        $reflection_property = $reflection->getProperty('battery');
        $reflection_property->setAccessible(true);
        $reflection_property->setValue($this->robot, $battery);
    
        $this->assertNull($this->robot->setCapacity(1.67));
    }

    public function testsetStatus(){
        $reflection = new ReflectionClass($this->robot);
        $reflection_property = $reflection->getProperty('status');
        $reflection_property->setAccessible(true);
        $reflection_property->setValue($this->robot, "clean");

        $this->assertNull($this->robot->setStatus(1.67));
    }
    
    public function testCleanUpForBatteryUsingMockery(){
        $startAt = 1;
        $endAt = 3;
        $this->robot->capacity = 100;

        $robotMock = Mockery::mock($this->robot);
        $robotMock->shouldReceive("cleanUp")
                  -> once()
                  -> with($startAt, $endAt)
                  -> andReturn(2);  
           
        $this->assertNotEquals($endAt, $robotMock->cleanUp($startAt, $endAt));
    }
}