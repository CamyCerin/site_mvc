<?php

namespace Repository;

use Manager\EntityRepository;

class ReviewRepository extends EntityRepository
{
    public function getAllReview()
    {
        return $this->findAll();
    }

    public function getFindReview($id)
    {
        $q = $this->getDb()->prepare("SELECT * FROM review r INNER JOIN article a ON r.article_id = a.id WHERE a.id = $id");
        $q->execute();
        $q->setFetchMode(PDO::FETCH_CLASS, 'Entity\\' . 'Review');
        $r = $q->fetch();

        if(!$r) {
            return false;
        }
        else {
            // return $q->fetch(PDO::FETCH_ASSOC);
            return $r;
        }
    }


    public function registerReview()
    {

        return $this->register();
    }
}