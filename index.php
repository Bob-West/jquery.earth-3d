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
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script>
        function changeFunc() {
            var selectBox = document.getElementById("airlines_namen");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            //alert(selectedValue);
        }
    </script>
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
<body style="background-color:black">
<div id="selection_boxes">
    <select name="city_names" style="margin-top:3%;margin-left:1%;" id="city_names">

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
        <option value="Shanghai">Shanghai</option>
    </select>

    <select name="airlines_namen" style="margin-top:3%;" id="airlines_namen">

        <?php foreach ($tt->getAirlinesByCity('Vienna') as $r): ?>
            <option value="<?php echo $r['name']?>" style="background-color:<?php echo $tt -> stringToColorCode($r['name'])?>">

                <?= $r['name'] ?></option>

        <?php endforeach; ?>
    </select>


</div>

<div id="show_lines">
    <?php foreach ($tt->getAirlinesByCity('Vienna') as $r): ?>
        <p id="p_airlines" style="background-color:<?php echo $tt -> stringToColorCode($r['name'])?>">

            <?= $r['name'] ?>
        </p>
    <?php endforeach; ?>

</div>

<div id="earth_div" style="margin-top:135px;">
</div>

</body>
</html>