<?php
require_once('db1/config.inc.php');
require_once('db1/functions.inc.php');

if(isset($_POST['city'])){
    $tt = new test();
    $str = 'anid robin';
    echo "var earth = new WE.map('earth_div');
    WE.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(earth);";

    foreach($tt -> getRoutes($_POST['city']) as $r) {


        $src_x = $r['src_x'];
        $src_x2 = $src_x + 0.000001;

        $src_y = $r['src_y'];
        $src_y2 = $src_y + 0.000001;

        $dst_x = $r['dst_x'];
        $dst_x2 = $dst_x + 0.000001;

        $dst_y = $r['dst_y'];
        $dst_y2 = $dst_y + 0.000001;

        //#ff0
        echo "var polygonA = WE.polygon([[".$src_x.",".$src_y."],[".$src_x2.",".$src_y2."],[".$dst_x.",".$dst_y."],[".$dst_x2.",".$dst_y2."]],{
        color: '#".$tt -> stringToColorCode($r['name'])."',
        opacity: 1,
        fillColor: '#f00',
        fillOpacity: 0.1,
        editable: false,
        weight: 2});
        
        polygonA.addTo(earth);";
    }
    echo"earth.setView([48, 6], 5);";
}


