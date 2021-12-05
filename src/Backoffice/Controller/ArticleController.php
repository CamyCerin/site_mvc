<?php
namespace Backoffice\Controller;

use Controller\Controller;
use Entity\User;

class ArticleController extends Controller
{

    public function __construct(){


        session_start();
    }

    public function addArticle(){

        if($_POST) {

            if (!empty($_FILES['picture']['name'])){
                copy($_FILES['picture']['tmp_name'], "upload/" . $_FILES['picture']['name']);
                $_POST['picture'] = $_FILES['picture']['name'];

            }

            //$_POST['author_id'] = $_SESSION['idUser'];

            $article = $this->getRepository('article');


            $article->registerArticle();
            return $this->render('layout.php', 'addArticle.php', array(
                'title'=>'Accueil'
            ));

        }else{

            return $this->render('layout.php', 'addArticle.php', array(
                'title'=>'Créer un article'
            ));
        }

    }

    public function showArticle(){

        if($_GET['action']=='showArticle' && isset($_GET['id'])){
            $articleRepo = $this->getRepository('article');
            $article = $articleRepo->getFindArticle($_GET['id']);
            $author = $articleRepo->getAuthorAndArticleFromArticleId($_GET['id']);
            $listReview = $articleRepo->getFindReview($_GET['id']);

        }

        return $this->render('layout.php', 'showArticle.php', array(
           'title'=>'Détail de l\'article',
            'article'=>$article,
            'author'=>$author,
            'listReview'=>$listReview
        ));

    }


    public function delArticle(){
        $articleRepo = $this->getRepository('article');
        $article = $articleRepo->getFindArticle($_GET['id']);

        if($_SESSION['user']->getId() == $article->getAuthorId()){
            $articleRepo->removeArticle($_GET['id']);

            return $this->render('layout.php', 'addArticle.php', array(
                'title'=>'Ajout d\'un article'
            ));
        }
    }

}