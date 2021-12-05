<?php

namespace Backoffice\Controller;

use Controller\Controller;

class ReviewController extends Controller
{

    public function __construct(){


        session_start();
    }

    public function addReview(){

        var_dump($_POST);

        if($_POST) {
            $review = $this->getRepository('review');

            $review->registerReview();

        }

        return $this->render('layout.php', 'addReview.php',array(
            'title'=>'Commentaire ajouté avec succès'
        ));
    }

    public function delReview(){



    }

}