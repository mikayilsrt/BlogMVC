<?php

namespace App\Models;

use PDO;

/**
 * Class User
 * @package App\Models
 */
class User {

    /**
     * This method create a new user in database.
     *
     * @param array $statement
     * @return bool
     */
    public function create ($statement = array()) {
        global $db;
        $result = false;
        try {
            // search if a user exist.
            $req = $db->getPDO()->query("SELECT email FROM blog_users WHERE email = '" . $statement[1] . "'");

            // if user is not exist.
            if ($req->fetch() == false) {
                $db->getPDO()
                    ->prepare("INSERT INTO blog_users (name, email, password, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())")
                    ->execute($statement);
                $result = true;
            }
        } catch (\Exception $ex) {
            die("Errors: " . $ex->getMessage());
        }

        return $result;
    }

    public function find_by_email_password($email, $password) {
        global $db;
        $result = array();

        try {
            $req = $db->getPDO()
                ->query("SELECT * FROM blog_users WHERE email = '" . $email . "' && password = '" . $password . "'");
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            
            if ($data) {
                $result = $data;
            }

        } catch (\Exception $ex) {
            die('Errors: ' . $ex->getMessage());
        }

        return $result;
    }

    public function getUserById($user_id)
    {
        global $db;
        try {
            return $db->getPDO()
                ->query("SELECT * FROM blog_users WHERE id = " . $user_id)
                ->fetch();
        } catch (Exeption $ex) {
            die('Errors: ' . $ex->getMessage());
        }
    }

    public function setName ($name, $user_id)
    {
        global $db;

        try {
            return $db->getPDO()
                ->query("UPDATE blog_users SET blog_users.name = '" . $name . "' WHERE blog_users.id = " . $user_id);
        } catch (Exeption $ex) {
            die('Errors: ' . $ex->getMessage());
        }
    }

    public function setEmail ($email, $user_id)
    {
        global $db;

        try {
            return $db->getPDO()
                ->query("UPDATE blog_users SET blog_users.email = '" . $email . "' WHERE blog_users.id = " . $user_id);
        } catch (Exeption $ex) {
            die('Errors: ' . $ex->getMessage());
        }
    }

    public function setPassword ($password, $user_id)
    {
        global $db;

        try {
            return $db->getPDO()
                ->query("UPDATE blog_users SET blog_users.password = '" . $password . "' WHERE blog_users.id = " . $user_id);
        } catch (Exeption $ex) {
            die('Errors: ' . $ex->getMessage());
        }
    }

}