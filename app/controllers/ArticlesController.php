<?php

namespace App\Controllers;

use Slim\Http\Request;
use App\Models\Article;
use Slim\Http\Response;

class ArticlesController extends Controller {

    public function index () {
        $posts = new Article();
        $articles = $posts->allArticles();

        require Controller::view("articles/index.view");
    }

    public function show (Request $request, Response $response, $arg) {

        $posts = new Article();
        $article = $posts->find_by_id($arg['id']);

        require Controller::view("articles/show.view");
    }

}