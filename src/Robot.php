<?php 

class Robot {
    private $battery;
    public  $status;
    public  $capacity;
    public  $action;

    function __construct($action, Battery $battery){
        $this->action = $action;
        $this->battery = $battery;
    }

    function cleanUp($startFloorAt, $endFloorAt) :int{
        for($i=$startFloorAt; $i<=$endFloorAt; $i++){
            sleep(1);
            $this->battery->power = $this->battery->power-$this->capacity;
            echo "<Robot is $this->status>... cleaned $i mt. sq. area  battery remaining = ". round($this->battery->power, 2)."%". PHP_EOL;
            if((int)$this->battery->power == 0){
                echo "Battery died :(((((".PHP_EOL;
                $endFloorAt = $i+1;
            break;
            }
        }
        return $endFloorAt;
    }

    function charge() {
        while(round($this->battery->power)<100){
            sleep(1);
            $this->battery->power += (100 / 30); 
            echo "<Robot is $this->status the battery> ... completed = ". round($this->battery->power, 2)."%". PHP_EOL;
        }
        echo "Battery full :)))))". PHP_EOL;
    }
}
