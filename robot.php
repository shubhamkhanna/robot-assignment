<?php
require "vendor/autoload.php";

define("ACTION", "clean");
define("CARPET", "carpet");
define("HARD", "hard");

try {
    $action = $argv[1];
    $floor  = explode("=",$argv[2])[1];
    $area   = explode("=",$argv[3])[1];

    if($action != ACTION){
        echo "Undefined action!!!".PHP_EOL;
        exit();
    }

    // $var  = getopt(NULL, ["floor:","area:"]);
    // $floor = $var["floor"];
    // $area = $var["area"];
    $battery = new Battery();
    $robot = new Robot($action, $battery);
    if($floor == CARPET){
        $carpet = new Carpet($area, $robot);
        $carpet->calculateCleanUp();
    }elseif ($floor== HARD){
        $hard = new Hard($area, $robot);
        $hard->calculateCleanUp();
    }else{
        echo "Invalid Floor!!!".PHP_EOL;
    }
}
catch(Exception $e) {
    echo "Invalid command passed!".$e->getMessage();
}