<?php
session_start();

error_reporting(E_ALL);
ini_set( 'display_errors','1');

require_once "../app/autoloader.php";
require_once "../app/Config/Config.php";

//echo '<pre>',print_r($_SERVER,1),'</pre>';

Router::route($_SERVER['REQUEST_URI']);

?>