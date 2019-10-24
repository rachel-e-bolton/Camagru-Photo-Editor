<?php

require_once "../app/App.php";


$uri = $_SERVER['REQUEST_URI'];

new App($uri);



?>