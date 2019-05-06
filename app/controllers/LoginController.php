<?php

namespace App\Controllers;

use Slim\Http\Request;

/**
 * Class LoginController
 * @package App\Controllers
 */
class LoginController extends Controller {

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

}