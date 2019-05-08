<?php

namespace App\Controllers;

use App\Models\User;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Flash\Messages;

/**
 * Class LoginController
 * @package App\Controllers
 */
class LoginController extends Controller {

    /**
     * Instance of message object.
     * 
     * @var Message
     */
    private $messages;

    /**
     * Constructor of LoginController.
     */
    public function __construct () {
        if (!isset($_SESSION)) {
            \session_start();
        }
        $this->messages = new Messages();
    }

    /**
     * Show the application login page.
     */
    public function index () {
        if (isset($_SESSION['user'])) {
            header('Location: /');
            die();
        }
        require Controller::view("login/index.view");
    }

    /**
     * Search user after form posted.
     * 
     * @param $request
     * @param $response
     */
    public function searchUser (Request $request, Response $response) {
        $formRequest = $request->getParsedBody();

        $email  = htmlspecialchars($formRequest['email']);
        $password = htmlspecialchars(md5($formRequest['password']));

        if (!empty($email) && !empty($password)) {
            $user = new User();

            $user_request = $user->find_by_email_password($email, $password);

            if ($user_request) {
                $this->createSession($user_request);

                header('Location: /');
                die();
            } else {
                $this->addFlashMessage("errors", "Identifiant ou mot de passe incorrect.");
            }
        } else {
            $this->addFlashMessage("errors", "Tous les champs doivent être remplis.");
        }

        $messages = $this->getMessages();

        require Controller::view("login/index.view");
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

    /**
     * create a new session if not existe.
     * 
     * @param array $userInformation
     */
    public function createSession ($userInformation) {
        $_SESSION['user'] = array(
            "name"  =>  $userInformation[0]->name,
            "email" =>  $$userInformation[0]->email,
            "created_at"    =>  $userInformation[0]->created_at,
            "updated_at"    =>  $userInformation[0]->updated_at
        );
    }

    /**
     * destroy the user session.
     */
    public function destroySession () {
        if ($_SESSION['user']) {
            unset($_SESSION['user']);
        }

        header('Location: /');
        die();
    }

}