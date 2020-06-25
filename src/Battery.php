<?php

define("BATTERY_MAX_LIMIT", 100.00, true);

class Battery{
    private $power;
    private $consumePower;
    
    function __construct(){
        $this->power = BATTERY_MAX_LIMIT;
    }

    function getPower(): float{
        return $this->power;
    }

    function setConsumePower($consumePower){
        $this->consumePower = $consumePower; 
    }

    function charge(){
        while(round($this->power)<100){
            sleep(1);
            $this->power += (100 / 30); 
            echo "<Robot is charging the battery> ... completed = ". round($this->power, 2)."%". PHP_EOL;
        }
        echo "Battery full :)))))". PHP_EOL;
    }

    function consume(){
        if((int)$this->power > 0){
            $this->power = $this->power - $this->consumePower;
        }else {
            throw new Exception("consumePower can not be exceed to power!");
        }
    }

}