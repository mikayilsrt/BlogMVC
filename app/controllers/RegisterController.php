<?php

namespace App\Controllers;

use Slim\Http\Request;

/**
 * Class RegisterController
 * @package App\Controllers
 */
class RegisterController extends Controller {

    /**
     * Show the application register page.
     */
    public function index () {
        Controller::view("register/index.view");
    }

    public function store (Request $request) {
        //
    }

}