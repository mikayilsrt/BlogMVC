<?php

namespace App\Controllers;

use Slim\Http\Request;
use App\Models\Article;
use Slim\Http\Response;
use Slim\Flash\Messages;

class ArticlesController extends Controller {
        
    /**
     * Instance of message object.
     * 
     * @var Message
     */
    private $messages;

    public function __construct () {
        $this->messages = new Messages();
    }
        
    /**
     * Add a new form message.
     * 
     * @param string $key (errors, success, etc..)
     * @param string $value
     */
    private function addFlashMessage ($key, $value) {
        $this->messages->addMessageNow($key, $value);
    }

    /**
     * Return all form message.
     * 
     * @return array
     */
    private function getMessages () {
        return $this->messages->getMessages();
    }

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

    public function create () {

        if (empty($_SESSION['user'])){
            \header('Location: /');
            die();
        }

        require Controller::view("articles/create.view");
    }


    public function store (Request $request, Response $response, $args) {
        $formRequest = $request->getParsedBody();
        $files = $request->getUploadedFiles();

        if (!empty($formRequest['title']) && !empty($formRequest['content']) && !empty($files['image']->getClientFilename()))
        {
            $targetPath = "./assets/img/posts/";
            $newfile = $files['image'];
            $uploadFileName = $_SESSION['user']['id'] . "-" . date('s') . "-" . $newfile->getClientFilename();
            \move_uploaded_file($newfile->file, $targetPath . $uploadFileName);
    
            $articleModel = new Article();
            $articleModel->create(array(
                $formRequest['title'],
                $formRequest['content'],
                $uploadFileName,
                $_SESSION['user']['id']
            ));
    
            
            $this->addFlashMessage("success", "Article créer avec succès !");
        } else {
            $this->addFlashMessage("errors", "Tous les champs doivent être remplis !");
        }

        $messages = $this->getMessages();


        require Controller::view("articles/create.view");
    }

}