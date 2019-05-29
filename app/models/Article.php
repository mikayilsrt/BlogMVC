<?php

namespace App\Models;

class Article {

    public function create ($statement = array()) {
        global $db;

        try {
            $db->getPDO()
                ->prepare("INSERT INTO blog_articles(title, content, thumbnail, user_id) VALUES(?, ?, ?, ?)")
                ->execute($statement);
        } catch (Exception $ex) {
            die('Errors: ' . $ex->getMessage());
        }
    }

    public function allArticles () {
        global $db;
        $posts = array();

        try {
            $datas = $db->getPDO()->query("SELECT blog_articles.*, blog_users.name FROM blog_articles JOIN blog_users ON blog_articles.user_id = blog_users.id")
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
            return $db->getPDO()->query("SELECT blog_articles.*, blog_users.name FROM blog_articles JOIN blog_users ON blog_articles.user_id = blog_users.id LIMIT 0, " . $size)
                ->fetchAll();
        } catch (Exception $ex) {
            die('Errors: ' . $ex->getMessage());
        }
    }

    public function find_by_id ($id) {
        global $db;

        try {
            $datas = $db->getPDO()->query("SELECT blog_articles.*, blog_users.name, blog_users.id as userID FROM blog_articles JOIN blog_users ON blog_articles.user_id = blog_users.id WHERE blog_articles.id = " . $id)
                ->fetchAll();
    
            if ($datas) {
                return $datas;
            }
        } catch (Exception $ex) {
            die('Errors: ' . $ex->getMessage());
        }
    }

    public function getArticlesByUserId ($user_id) {
        global $db;

        try {
            return $db->getPDO()->query("SELECT blog_articles.* FROM blog_articles WHERE user_id = " . $user_id)
                ->fetchAll();
        } catch (Exeption $ex) {
            die('Errors: ' . $ex->getMessage());
        }
    }

    public function getNbVoteByPostId ($post_id) {
        global $db;

        try {
            return $db->getPDO()->query("SELECT count(id) FROM blog_votes WHERE id_post = " . $post_id)
                ->fetch();
        } catch (Exeption $ex) {
            die('Errors: ' . $ex->getMessage());
        }
    }

    public function getCommentByPostId ($id) {
        global $db;

        try {
            return $db->getPDO()->query("SELECT blog_comments.content, blog_comments.created_at, blog_users.name FROM blog_comments JOIN blog_users ON blog_comments.id_user = blog_users.id WHERE blog_comments.id_post = '" . $id . "' ORDER BY blog_comments.created_at DESC")
                ->fetchAll();
        } catch (Exeption $ex) {
            die('Errors: ' . $ex->getMessage());
        }
    }

    public function addCommentOnArticle ($statement = array()) {
        global $db;
        $result = false;
        
        try {
            $db->getPDO()
                ->prepare("INSERT INTO blog_comments(content, id_user, id_post) VALUES(?, ?, ?)")
                ->execute($statement);

            $result = true;
        } catch (Exeption $ex) {
            die('Errors: ' . $ex->getMessage());
        }

        return $result;
    }

    public function addNewVote ($statement = array()) {
        global $db;
        $result = false;
        
        try {

            $resultIfVote = $db->getPDO()
                // $statement[0] = id de l'article.
                // $statement[1] = id de l'utilisateur.
                ->query("SELECT id_post, id_user FROM blog_votes WHERE id_post = '" . $statement[0] . "' and id_user = " . $statement[1])
                ->fetch();

            if ($resultIfVote == false) {
                $db->getPDO()
                ->prepare("INSERT INTO blog_votes(id_post, id_user) VALUES(?, ?)")
                ->execute($statement);

                $result = true;
            }

        } catch (Exeption $ex) {
            die('Errors: ' . $ex->getMessage());
        }

        return $result;
    }

}