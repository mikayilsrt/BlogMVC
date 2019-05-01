<?php

use App\config\database;
use App\Controllers\IndexController;
use Slim\App as Router;

require "../vendor/autoload.php";

define("DB_HOST", "localhost");
define("DB_NAME", "blog-mvc");
define("DB_USER", "root");
define("DB_PASSWORD", "");

$database = new database(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
$database->getPDO();

$app = new Router();

$app->get('/', function ($request, $response, $args) {
    $IndexController = new IndexController();
    $IndexController->index();
});

$app->run();