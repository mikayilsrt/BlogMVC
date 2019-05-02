<?php

namespace App\Controllers;

use App\Models\User;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class RegisterController
 * @package App\Controllers
 */
class RegisterController extends Controller {

    /**
     * Show the form for creating a new resource.
     */
    public function index () {
        Controller::view("register/index.view");
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @param Response $response
     */
    public function store (Request $request, Response $response) {
        $formRequest = $request->getParsedBody();

        $name = htmlspecialchars($formRequest['name']);
        $email  = htmlspecialchars($formRequest['email']);
        $password = htmlspecialchars(md5($formRequest['password']));
        $passwordConfirm = htmlspecialchars(md5($formRequest['confirm_password']));

        if (!empty($name) && !empty($email) && !empty($password) && $passwordConfirm) {
            if ($password === $passwordConfirm) {
                $user = new User();
                $result = $user->create(
                    array($name, $email, $password)
                );

                $result ? $response->withRedirect("/login", 202) : die("Error");
            }
        }

        // return $response->withRedirect("login", 202);
    }

}