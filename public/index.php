<?php

session_start();

use Dotenv\Dotenv;
use Slim\App as Router;
use App\config\database;
use App\Controllers\IndexController;
use App\Controllers\LoginController;
use App\Controllers\ProfileController;
use App\Controllers\ArticlesController;
use App\Controllers\RegisterController;
use App\Controllers\SettingsController;

require "../vendor/autoload.php";

$dotenv = Dotenv::create(__DIR__ . "/..");
$dotenv->load();

define("DB_HOST", $_ENV['DB_HOST']);
define("DB_NAME", $_ENV['DB_NAME']);
define("DB_USER", $_ENV['DB_USER']);
define("DB_PASSWORD", $_ENV['DB_PASSWORD']);

$db = new database(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);

$app = new Router();

$app->get('/', function ($request, $response, $args) {
    $IndexController = new IndexController();
    $IndexController->index();
});

$app->get('/new-article', function ($request, $response, $args) {
    $ArticlesController = new ArticlesController();
    $ArticlesController->create();
});

$app->post('/new-article', function ($request, $response, $args) {
    $ArticlesController = new ArticlesController();
    $ArticlesController->store($request, $response, $args);
});

$app->get('/articles', function ($request, $response, $args) {
    $ArticlesController = new ArticlesController();
    $ArticlesController->index();
});

$app->get('/articles/{id}', function ($request, $response, $args) {
    $ArticlesController = new ArticlesController();
    $ArticlesController->show($request, $response, $args);
});

$app->post('/comments', function ($request, $response, $args) {
    $ArticlesController = new ArticlesController();
    $ArticlesController->storeComment($request, $response);
});

$app->post('/vote', function ($request, $response, $args) {
    $ArticlesController = new ArticlesController();
    $ArticlesController->addVote($request, $response);
});

$app->get('/profile/{id}', function ($request, $response, $args) {
    $ProfileController = new ProfileController();
    $ProfileController->index($request, $response, $args);
});

$app->get('/profile/{id}/settings', function ($request, $response, $args) {
    $SettingsController = new SettingsController();
    $SettingsController->index($args);
});

$app->post('/profile/{id}/settings', function ($request, $response, $args) {
    $SettingsController = new SettingsController();
    $SettingsController->update($request, $response, $args);
});

$app->get('/login', function ($request, $response, $args) {
    $LoginController = new LoginController();
    $LoginController->index();
});

$app->post('/login', function ($request, $response, $args) {
    $LoginController = new LoginController();
    $LoginController->searchUser($request, $response);
});

$app->get('/register', function ($request, $response, $args) {
    $RegisterController = new RegisterController();
    $RegisterController->index();
});

$app->post('/register', function ($request, $response, $args) {
    $RegisterController = new RegisterController();
    $RegisterController->store($request, $response);
});

$app->post('/logout', function ($request, $response, $args) {
    $LoginController = new LoginController();
    $LoginController->destroySession();
});

$app->run();