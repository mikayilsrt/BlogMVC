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
            $req = $db->getPDO()->query("SELECT email FROM users WHERE email = '" . $statement[1] . "'");

            // if user is not exist.
            if ($req->fetch() == false) {
                $db->getPDO()
                    ->prepare("INSERT INTO users (name, email, password, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())")
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
                ->query("SELECT * FROM users WHERE email = '" . $email . "' && password = '" . $password . "'");
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            
            if ($data) {
                $result = $data;
            }

        } catch (\Exception $ex) {
            die('Errors: ' . $ex->getMessage());
        }

        return $result;
    }

}