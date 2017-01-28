<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 12.01.17
 * Time: 14:57
 */

require_once('db1/config.inc.php');
require_once('db1/functions.inc.php');
//require_once('functions.php');

$tt = new test();

?>

<html>
<head>
    <script src="js/api.js"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/script.js"></script>
    <script id="earth_script">

        var posting = $.ajax({
            type: 'POST',
            url: 'functions.php',
            data: {city: 'Vienna'},
            dataType: "html",
            async: false
        });

        posting.done(function (data) {
            /*$("#earth_script").append($("<script id='below_earth'/>", {
             html: data
             }));*/

            $(document).ready(function () {
                eval(data);
            });
        });


    </script>
    <style>
        html, body {
            padding: 0;
            margin: 0;
        }

        #earth_div {
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: #000;
            position: absolute !important;
        }
    </style>
    <title>WebGL Earth API: Polygon</title>
</head>
<body>
<div id="selection_boxes">
    <select name="city_names" id="city_names">
        <option>..StÃ¤dte...</option>
        <option value="Vienna">Wien</option>
        <option value="Berlin">Berlin</option>
        <!--option value="Roma">Rom</option-->
        <option value="Madrid">Madrid</option>
        <option value="Paris">Paris</option>
        <option value="Moscow">Moskau</option>
        <option value="London">London</option>
        <option value="Beijing">Peking</option>
        <option value="Bangkok">Bangkok</option>
        <option value="New York">New York</option>
        <option value="Johannesburg">Johannesburg</option>
        <option value="Dubai">Dubai</option>
    </select>

    <select id="airlines_namen" style="background-color:#<?= $tt -> stringToColorCode($tt->getFirstAirline())?>">

        <?php foreach ($tt->getAirlinesByCity('Vienna') as $r): ?>
            <option style="background-color:#<?= $tt -> stringToColorCode($r['name'])?>">

                <?= $r['name'] ?></option>

        <?php endforeach; ?>
    </select>


</div>
<div id="earth_div" style="margin-top:30px;">
</div>

</body>
</html>