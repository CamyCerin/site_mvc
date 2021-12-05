<?php
namespace Repository;

use Manager\EntityRepository;


class UserRepository extends EntityRepository
{

    public function getAllUser()
    {
        return $this->findAll();
    }

    public function getFindUser($id)
    {
        return $this->find($id);
    }

    public function getFindByUser($req, $field)
    {

        return $this->findBy($req, $field);
    }


    public function registerUser()
    {

        return $this->register();
    }

    public function removeReview($id){
        $q = $this->getDb()->prepare("DELETE FROM article WHERE id = $id");
        $q->execute();
    }

}