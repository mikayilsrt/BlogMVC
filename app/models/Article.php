<?php

namespace App\Models;

class Article {

    public function allArticles () {
        global $db;
        $posts = array();

        try {
            $datas = $db->getPDO()->query("SELECT articles.*, users.name FROM articles JOIN users ON articles.user_id = users.id")
                ->fetchAll();
    
            if ($datas) {
                $posts = $datas;
            }
        } catch (Exception $ex) {
            die('Errors: ' . $ex->getMessage());
        }

        return $posts;
    }

    public function getArticlesLimited ($size = 3) {
        global $db;
        
        try {
            return $db->getPDO()->query("SELECT articles.*, users.name FROM articles JOIN users ON articles.user_id = users.id LIMIT 0, " . $size)
                ->fetchAll();
        } catch (Exception $ex) {
            die('Errors: ' . $ex->getMessage());
        }
    }

    public function find_by_id ($id) {
        global $db;

        try {
            $datas = $db->getPDO()->query("SELECT articles.*, users.name FROM articles JOIN users ON articles.user_id = users.id WHERE articles.id = " . $id)
                ->fetchAll();
    
            if ($datas) {
                return $datas;
            }
        } catch (Exception $ex) {
            die('Errors: ' . $ex->getMessage());
        }
    }

}