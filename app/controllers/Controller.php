<?php

namespace App\Controllers;

/**
 * Class Controller
 * @package App\Controllers
 */
class Controller {

    /**
     * Require the view of the page.
     * @param String $path
     */
    static function view ($path) {
        require __DIR__ . "/../resources/views/" . $path . ".php";
    }

}