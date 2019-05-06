<?php

namespace App\Controllers;

use App\Models\User;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class LoginController
 * @package App\Controllers
 */
class LoginController extends Controller {

    public function __construct () {
        if (!$_SESSION) {
            \session_start();
        }
    }

    /**
     * Show the application login page.
     */
    public function index () {
        require Controller::view("login/index.view");
    }

    public function store (Request $request) {
        $formRequest = $request->getParsedBody();
        echo "<pre>";
        var_dump($formRequest);
        echo "</pre>";
    }

    public function searchUser (Request $request, Response $response) {
        $formRequest = $request->getParsedBody();

        $email  = htmlspecialchars($formRequest['email']);
        $password = htmlspecialchars(md5($formRequest['password']));

        if (!empty($email) && !empty($password)) {
            $user = new User();

            $user_request = $user->find_by_email_password($email, $password);

            echo "<pre>";
            var_dump($user_request);
            echo "</pre>";
        }
    }

    public function createSession () {
        $_SESSION['user'] = array(
            "name"  =>  $name,
            "email" =>  $email,
            "created_at"    =>  $created_at,
            "updated_at"    =>  $updated_at
        );
    }

}