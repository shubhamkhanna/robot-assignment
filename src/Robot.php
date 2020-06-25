<?php 

class Robot {
    private  $battery;
    private  $status;
    private  $action;

    function __construct($action){
        $this->action = $action;
        $this->battery = new Battery();
    }

    function getAction(): string{
        return $this->action;
    }

    function setCapacity($capacity){
        $this->battery->setConsumePower($capacity);
    }

    function setStatus($status){
        $this->status = $status;
    }

    function cleanUp($startFloorAt, $endFloorAt) :int{
        for($i=$startFloorAt; $i<=$endFloorAt; $i++){
            sleep(1);
            $this->battery->consume();
            echo "<Robot is $this->status>... cleaned $i mt. sq. area  battery remaining = ". abs(round($this->battery->getPower(), 2))."%". PHP_EOL;
            if((int)$this->battery->getPower() == 0){
                echo "Battery died :(((((".PHP_EOL;
                $endFloorAt = $i+1;
            break;
            }
        }
        return $endFloorAt;
    }

    function chargeMe(){
        $this->battery->charge(); 
    }
}
