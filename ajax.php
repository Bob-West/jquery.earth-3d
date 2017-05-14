<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 25.01.17
 * Time: 10:02
 */

require_once('db1/config.inc.php');
require_once('db1/functions.inc.php');

if(isset($_POST['city'])){
   
    $tt = new test();
    //echo $tt -> getAirlinesByCity('Berlin');
    foreach($tt -> getAirlinesByCity($_POST['city']) as $r):

        echo "<option style='background-color:".$tt -> stringToColorCode($r['name'])."'>" . $r['name'] . "</option>";
        //echo 'Test';
		
    endforeach;
    
}

