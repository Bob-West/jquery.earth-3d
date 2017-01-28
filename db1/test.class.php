<?php

/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 12.01.17
 * Time: 15:49
 */
class test
{
    private $db;

    function __construct(){
        try {
            $this -> db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PW);
        } catch(PDOException $e){
            echo "Verbindung fehlgeschlagen";
            die();
        }
    }

    function getThemen(){

        $result = $this -> db -> query("SELECT * from airlines");
        return $result = $result -> fetchAll(PDO::FETCH_ASSOC);
    }
    function getFirstAirline(){

        $airline = $this -> db -> query("SELECT distinct al.name FROM routes AS r JOIN airlines AS al ON r.alid = al.alid WHERE al.active = 'Y' LIMIT 1");

        return $airline = $airline -> fetchAll(PDO::FETCH_ASSOC);


    }

    function getAirlines(){

        $airlines = $this -> db -> query("SELECT distinct al.name FROM routes AS r JOIN airlines AS al ON r.alid = al.alid WHERE al.active = 'Y'");
        return $airlines = $airlines -> fetchAll(PDO::FETCH_ASSOC);
    }

    function getAirlinesByCity($city){
        $query_prep = "SELECT distinct al.name FROM routes AS r 
        JOIN airlines AS al ON r.alid = al.alid 
        JOIN airports AS ap_src ON r.src_apid = ap_src.apid
        JOIN airports AS ap_dst ON r.dst_apid = ap_dst.apid 
        WHERE al.active = 'Y' AND (ap_src.city = '$city' OR ap_dst.city = '$city') ";
        //return $query_prep;
        $airlines = $this -> db -> query($query_prep);
        return $airlines = $airlines -> fetchAll(PDO::FETCH_ASSOC);
    }

    function getRoutes($city){

        $routes = $this -> db -> query("SELECT r.airline, r.alid, ap_src.city as src_city, ap_src.y as src_x, ap_src.x as src_y, ap_dst.city as dst_city, ap_dst.y as dst_x, ap_dst.x as dst_y, al.name FROM routes AS r
        JOIN airlines AS al ON r.alid = al.alid
        JOIN airports AS ap_src ON r.src_apid = ap_src.apid
        JOIN airports AS ap_dst ON r.dst_apid = ap_dst.apid
        WHERE al.active = 'Y' and (ap_src.city = '$city' Or ap_dst.city = '$city')");
        return $routes = $routes -> fetchAll(PDO::FETCH_ASSOC);
    }
    function stringToColorCode($str){

        $code = dechex(crc32($str));
        $code = substr($code,0,6);
        return $code;
    }


}