<?php

namespace Repository;

use Manager\EntityRepository;
use PDO;

class ArticleRepository extends EntityRepository
{

    public function getAllArticle()
    {
        return $this->findAll();
    }

    public function getFindArticle($id)
    {
        return $this->find($id);
    }

    public function getFindByArticle($req, $field)
    {

        return $this->findBy($req, $field);
    }


    public function registerArticle()
    {

        return $this->register();
    }

    public function getAuthorAndArticleFromArticleId($id){

        $q = $this->getDb()->prepare("SELECT u.username FROM user u INNER JOIN article a ON u.id = a.author_id  WHERE a.id = $id");
        $q->execute();
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $r = $q->fetch();

        if(!$r) {
            return false;
        }
        else {
            // return $q->fetch(PDO::FETCH_ASSOC);
            return $r;
        }
    }

    public function removeArticle($id){
        $q = $this->getDb()->prepare("DELETE FROM article WHERE id = $id");
        $q->execute();
    }

    public function getFindReview($id)
    {
        $q = $this->getDb()->prepare("SELECT r.id, r.content, r.created_date, r.article_id, r.author_id, u.username FROM review r INNER JOIN article a ON r.article_id = a.id INNER JOIN user u ON r.author_id = u.id WHERE a.id = $id;");
        $q->execute();
        $q->setFetchMode(PDO::FETCH_CLASS, 'Entity\\' . 'Review');
        $r = $q->fetchAll();

        if(!$r) {
            return false;
        }
        else {
            // return $q->fetch(PDO::FETCH_ASSOC);
            return $r;
        }


    }
}