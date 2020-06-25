<?php

class Hard implements Floor{
    private $area;
    private $robot;

    function __construct($area, Robot $robot){
        $this->area = $area;
        $this->robot = $robot;
        $this->robot->setCapacity((100 / 60));
    }
 
    function calculateCleanUp(){
        echo "[action =". $this->robot->getAction() ."]"." Hard foor with area $this->area mt sq".PHP_EOL;
        $this->robot->setStatus("cleaning");
        $cleanedUpArea = $this->robot->cleanUp(1, $this->area);
        while($cleanedUpArea<$this->area){
            $this->robot->setStatus("charging");
            $this->robot->chargeMe();
            $this->robot->setStatus("cleaning");
            $cleanedUpArea = $this->robot->cleanUp($cleanedUpArea, $this->area);
        }
        
        echo "\nTask done!!!".PHP_EOL;
    }
}
