<?php

namespace App\Controllers;

use App\Models\User;
use Slim\Http\Request;
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
        $user = $userModel->getUserById($arg['id']);

        if ($user === false) {
            die("User is not exist.");
        }
        
        require Controller::view("profile/index.view");
    }

}