<?php

use App\config\database;

require "../vendor/autoload.php";

define("DB_HOST", "localhost");
define("DB_NAME", "blog-mvc");
define("DB_USER", "root");
define("DB_PASSWORD", "");

$database = new database(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
$database->getPDO();