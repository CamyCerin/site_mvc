<?php
require_once(__DIR__ . '/../vendor/autoload.php');
define('BASE_URL', 'http://localhost/php/site_mvc');

if(isset($_GET['action'])){

    if($_GET['action']=='login'){
        $user= new Backoffice\Controller\UserController();
        $user->login();

    }else if($_GET['action']=='registration') {

        $user = new Backoffice\Controller\UserController();
        $user->registration();

    }elseif($_GET['action']=='addArticle'){

        $product= new \Backoffice\Controller\ArticleController;
        $product->addArticle();
    }elseif($_GET['action']=='logout'){
        $user = new Backoffice\Controller\UserController();
        $user->logout();
    }elseif($_GET['action']=='showArticle'){
        $product = new \Backoffice\Controller\ArticleController;
        $product->showArticle();
    }elseif($_GET['action']=='delArticle'){
        $product = new \Backoffice\Controller\ArticleController;
        $product->delArticle();
    }elseif($_GET['action']=='addReview'){
        $review = new \Backoffice\Controller\ReviewController;
        $review->addReview();
    }

}else{
    $user= new Backoffice\Controller\UserController();
    $user->home();

}