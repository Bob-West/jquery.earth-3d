<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 12.01.17
 * Time: 14:57
 */

require_once('config.inc.php');
require_once('functions.inc.php');

$tt = new test();

?>

<html>
    <head>

    <title>TESTPAGE</title>

    </head>
    <header>
        <h1>TEST</h1>
    </header>
    <body>

    <?php foreach($tt -> getThemen() as $r):?>

            <option><?=$r['name']?></option>

    <?php endforeach;?>

    </body>
</html>
