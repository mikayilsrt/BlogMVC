<?php

namespace App\Controllers;

use App\Models\User;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Flash\Messages;

/**
 * Class SettingsController
 * @package App\Controllers
 */
class SettingsController extends Controller {

    private $messages;

    public function __construct () {
        $this->messages = new Messages();
    }

    public function index ($args) {
        if (empty($_SESSION['user'])) {
            header('Location: /');
            die();
        }

        $userModel = new User();
        $user = $userModel->getUserById($args['id']);

        require Controller::view("settings/index.view");
    }

    public function update (Request $request, Response $response, $args)
    {
        $userModel = new User();
        $user = $userModel->getUserById($args['id']);
        
        $name = \htmlspecialchars($_POST['name']);
        $email = \htmlspecialchars($_POST['email']);
        $password = \htmlspecialchars(md5($_POST['password']));
        $confirmPassword = \htmlspecialchars(md5($_POST['confirm_password']));

        if ($password == $confirmPassword) {

            if (!empty($name) && $name != $user['name']) {
                $updateName = $userModel->setName($name, $args['id']);

                if ($updateName) {
                    $this->addFlashMessage('success', "Nom d'utilisateur mise à jours !");
                }
            }
            
            if (!empty($email) && $email != $user['email']) {
                $updateEmail = $userModel->setEmail($email, $args['id']);

                if ($updateEmail) {
                    $this->addFlashMessage('success', "Nom d'utilisateur mise à jours !");
                }
            }
    
            if (!empty($password) && $password != $user['password']) {
                $updatePassword = $userModel->setPassword($password, $args['id']);

                if ($updatePassword) {
                    $this->addFlashMessage('success', "Nom d'utilisateur mise à jours !");
                }
            }

        } else {
            $this->addFlashMessage("errors", "Mot de passe incorrecte.");
        }
        
        $messages = $this->getMessages();

        require Controller::view("settings/index.view");
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