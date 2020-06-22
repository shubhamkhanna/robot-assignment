<?php

class Hard extends Robot implements Floor{
    public $area;

    function __construct($area, Robot $robot){
        $this->area = $area;
        $this->capacity = (100 / 60);
        $this->action  = $robot->action;
    }
    
    function calculateCleanUp(){
        echo "[action = $this->action] Hard foor with area $this->area mt sq".PHP_EOL;
        $this->status = "cleaning";
        $cleanedUpArea = $this->cleanUp(1, $this->area);
        while($cleanedUpArea<$this->area){
            $this->status = "charging";
            $this->charge();
            $this->status = "cleaning";
            $cleanedUpArea = $this->cleanUp($cleanedUpArea, $this->area);
        }
        
        echo "\nTask done!!!".PHP_EOL;
    }
}
