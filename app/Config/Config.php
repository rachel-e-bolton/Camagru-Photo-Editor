<?php

define("ROOT", dirname(__DIR__));
define("VIEWS", ROOT . "/Views/");

define("DATABASE_URI", "127.0.0.1");
define("DATABASE_USER", "camagru");
define("DATABASE_PASS", file_get_contents(ROOT . "/Config/.db_pass"));



// Set some headers
header('X-Frame-Options: SAMEORIGIN');

// Delete moosend account

