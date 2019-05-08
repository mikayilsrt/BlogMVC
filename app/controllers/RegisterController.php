<?php

namespace App\Controllers;

use App\Models\User;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Flash\Messages;

/**
 * Class RegisterController
 * @package App\Controllers
 */
class RegisterController extends Controller {
    
    /**
     * Instance of message object.
     * 
     * @var Message
     */
    private $messages;
    
    /**
     * Constructor of register controller.
     */
    public function __construct() {
        if (!isset($_SESSION)) {
            \session_start();
        }
        if (isset($_SESSION['user'])) {
            header('Location: /');
            die();
        }
        $this->messages = new Messages();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function index () {
        require Controller::view("register/index.view");
    }

    /**
     * Store a newly created resource in storage.
     *
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
                // instance a new user model.
                $user = new User();

                // add new user and return true or false.
                $result = $user->create(
                    array($name, $email, $password)
                );
                // if user is created redirect in login page.
                if ($result) { 
                    header('Location: /login');
                    die();
                } else {
                    $this->addFlashMessage("errors", "Utilisateur existant :(");
                }
            } else {
                $this->addFlashMessage("errors", "Mot de passe non confirmer.");
            }
        } else {
            $this->addFlashMessage("errors", "Tous les champs doivent être remplis.");
        }

        $messages = $this->getMessages();

        require Controller::view("register/index.view");
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

}