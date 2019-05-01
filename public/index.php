<?php

use App\config\database;
use App\Controllers\IndexController;
use App\Controllers\LoginController;
use App\Controllers\RegisterController;
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

$app->get('/login', function ($request, $response, $args) {
    $LoginController = new LoginController();
    $LoginController->index();
});

$app->post('/login', function ($request, $response, $args) {
    $LoginController = new LoginController();
    $LoginController->store($request);
});

$app->get('/register', function ($request, $response, $args) {
    $RegisterController = new RegisterController();
    $RegisterController->index();
});

$app->post('/register', function ($request, $response, $args) {
    $RegisterController = new RegisterController();
    $RegisterController->store($request);
});

$app->run();