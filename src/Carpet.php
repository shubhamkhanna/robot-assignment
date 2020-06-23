<?php

class Carpet implements Floor{
    public $area;
    public $robot;

    function __construct($area, Robot $robot){
        $this->area = $area;
        $this->robot  = $robot;
        $robot->capacity = (100 / 30);
    }
    
    function calculateCleanUp(){
        echo "[action =". $this->robot->action ."]"." Carpet foor with area $this->area mt sq".PHP_EOL;
        $this->robot->status = "cleaning";
        $cleanedUpArea = $this->robot->cleanUp(1, $this->area);
        while($cleanedUpArea<$this->area){
            $this->robot->status = "charging";
            $this->robot->charge();
            $this->robot->status = "cleaning";
            $cleanedUpArea = $this->robot->cleanUp($cleanedUpArea, $this->area);
        }
        
        echo "\nTask done!!!".PHP_EOL;
    }
}
