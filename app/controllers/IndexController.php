<?php

namespace App\Controllers;

/**
 * Class IndexController
 * @package App\Controllers
 */
class IndexController extends Controller {

    /**
     * Show the application home page.
     */
    public function index () {
        require Controller::view("home/index.view");
    }

}