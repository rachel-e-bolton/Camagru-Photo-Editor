<?php

define("ROOT", dirname(__DIR__));
define("VIEWS", ROOT . "/Views/");
define("SNIPS", ROOT . "/Views/Snippets/");
define("TEMP",  ROOT . "/Temp/");
define("EMAIL_TEMPLATES", ROOT . "/EmailTemplates/");

define("DATABASE_URI", "localhost");
define("DATABASE_USER", "root");
define("DATABASE_PASS", file_get_contents(ROOT . "/Config/.db_pass"));

define("ADMIN_EMAIL", "glen@wasserfalls.co.za");

define("SALT", "whoEvEnusEsinstagram");
define("SERVER_ADDRESS", "http://localhost:8080/");

header('X-Frame-Options: SAMEORIGIN');