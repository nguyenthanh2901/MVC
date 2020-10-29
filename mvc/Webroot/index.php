<?php

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

use Core;
use Dispatcher\Dispatcher;
use Route;
use Request;

$dispatch = new Dispatcher();
$dispatch->dispatch();
