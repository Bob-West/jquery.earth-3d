<?php

error_reporting(E_ALL & ~E_NOTICE);

spl_autoload_register(function ($class) {
    require_once 'test.class.php';
});