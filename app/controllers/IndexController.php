<?php

namespace App\Controllers;

use App\Models\Article;

/**
 * Class IndexController
 * @package App\Controllers
 */
class IndexController extends Controller {

    /**
     * Show the application home page.
     */
    public function index () {

        $article = new Article();

        $articles = $article->getArticlesLimited(6);

        require Controller::view("home/index.view");
    }

}