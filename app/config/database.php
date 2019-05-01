<?php

namespace App\config;

use PDO;

/**
 * Class database
 * @package config
 */
class database {

    private $db_host;
    private $db_name;
    private $db_user;
    private $db_password;
    private $pdo;

    /**
     * Constructor of database.
     * database constructor.
     * @param String $db_host
     * @param String $db_name
     * @param String $db_user
     * @param String $db_password
     */
    public function __construct($db_host = null, $db_name = null, $db_user = null, $db_password = null)
    {
        $this->db_host = $db_host;
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
    }

    /**
     * Return the connection to the database.
     * @return \PDO
     */
    public function getPDO () {
        if ($this->pdo === null) {
            $pdo = new \PDO("mysql:host=$this->db_host;dbname=$this->db_name;charset=UTF8", "$this->db_user", "$this->db_password");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

}