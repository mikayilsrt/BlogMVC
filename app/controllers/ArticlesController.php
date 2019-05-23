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
        $comments = $posts->getCommentByPostId($arg['id']);
        $nbVote = $posts->getNbVoteByPostId($arg['id']);

        if ($article === null) {
            header('Location: /');
            die();
        }

        require Controller::view("articles/show.view");
    }

    public function storeComment (Request $request, Response $response) {
        $formRequest = $request->getParsedBody();

        if (!empty($formRequest['comment'])) {
            $article = new Article();

            $result = $article->addCommentOnArticle(array(
                $formRequest['comment'],
                $_SESSION['user']['id'],
                $formRequest['articleID']
            ));

            if ($result) {
                \header('Location: ' . $_SERVER["HTTP_REFERER"]);
                die();
            }
        } else {
            \header('Location: ' . $_SERVER["HTTP_REFERER"]);
            die();
        }
    }

    public function addVote (Request $request, Response $response) {
        $formRequest = $request->getParsedBody();

        $articleModel = new Article();
        $articleModel->addNewVote(array(
            $formRequest['article_id'],
            $_SESSION['user']['id']
        ));

        \header('Location: ' . $_SERVER["HTTP_REFERER"]);
        die();
    }

}