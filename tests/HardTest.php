<?php

use PHPUnit\Framework\TestCase;

class HardTest extends TestCase{
    function setUp(){
        $this->robot = new Robot("clean", new Battery());
        // Suppress  output to console
        $this->setOutputCallback(function() {});
    }
    
    function testCalculateCleanUpToCleanEntireFloor(){
        $carpet = new Hard(1, $this->robot);
        
        $this->assertEquals(NULL, $carpet->calculateCleanUp());
    }

    function testCalculateCleanUpToRaiseExceptionForInvalidArea(){
        $carpet = new Hard("a", $this->robot);
        $this->expectException(TypeError::class);
        $carpet->calculateCleanUp();
    }
}
    