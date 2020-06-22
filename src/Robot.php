<?php 

define("BATTERY_MAX_LIMIT", 100, true);

class Robot {
    private $battery=BATTERY_MAX_LIMIT;
    protected $status;
    protected $capacity;
    public $action;

    function __construct($action){
        $this->action = $action;
    }

    function cleanUp($startFloorAt, $endFloorAt) :int{
        for($i=$startFloorAt; $i<=$endFloorAt; $i++){
            sleep(1);
            $this->battery = $this->battery-$this->capacity;
            echo "<Robot is $this->status>... cleaned $i mt. sq. area  battery remaining = ". round($this->battery, 2)."%". PHP_EOL;
            if((int)$this->battery == 0){
                echo "battery died!!!!!!".PHP_EOL;
                $endFloorAt = $i+1;
            break;
            }
        }
        return $endFloorAt;
    }

    function charge() {
        while(round($this->battery)<100){
            sleep(1);
            $this->battery += (100 / 30); 
            echo "<Robot is $this->status the battery> ... completed = ". round($this->battery, 2)."%". PHP_EOL;
        }
        echo "battery full!!!!!!". PHP_EOL;
    }
}
