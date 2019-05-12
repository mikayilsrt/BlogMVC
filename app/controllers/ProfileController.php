<?php

namespace App\Controllers;

use App\Models\User;
use Slim\Http\Request;
use App\Models\Article;
use Slim\Http\Response;

/**
 * Class ProfileController
 * @package App\Controllers
 */
class ProfileController extends Controller {

    /**
     * Show the application home page.
     */
    public function index (Request $request, Response $response, $arg) {
        $userModel = new User();
        $articleModel = new Article();

        $user = $userModel->getUserById($arg['id']);
        $articles = $articleModel->getArticlesByUserId($arg['id']);

        if ($user === false) {
            die("User is not exist.");
        }
        
        require Controller::view("profile/index.view");
    }

}