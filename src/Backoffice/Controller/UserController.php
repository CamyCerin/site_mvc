<?php

namespace Backoffice\Controller;

use Controller\Controller;
use Repository\ArticleRepository;

class UserController extends Controller
{

    public function __construct()
    {

        session_start();
    }

    public function registration()
    {

        if (!$_POST) {

            return $this->render('layout.php', 'registration.php', array(
                'title' => 'Inscription'
            ));

        } else {

            $user = $this->getRepository('User');
            $mail = $user->getFindByUser($_POST['email'], 'email');
            //die(var_dump($mail[0]->getFirstname()));
            if ($mail) {
                $error = 'Désolé un compte éxiste déjà avec cette adresse mail';
                return $this->render('layout.php', 'registration.php', array(
                    'title' => 'Inscription',
                    'message' => $error
                ));

            } else {

                $user->registerUser();
                $success = 'Félicitation votre inscription est faite';

                return $this->render('layout.php', 'login.php', array(
                    'title' => 'Connexion',
                    'success' => $success
                ));
            }
        }


    }

    public function login()
    {

        if ($_POST) {
            $user = $this->getRepository('User');
            $mail = $user->getFindByUser($_POST['email'], 'email');

            if ($mail) {
                $mdp = $mail[0]->getPassword();
                if (password_verify($_POST['password'], $mdp)) {

                    $_SESSION['user'] = $mail[0];
                    $nom = $mail[0]->getUsername();
                    $success = "Bienvenue $nom";


                    return $this->render('layout.php', 'login.php', array(
                        'title' => 'Vous êtes connecté',
                        'success' => $success,

                    ));
                } else {
                    $error = 'Votre mot de passe est incorrect';
                    return $this->render('layout.php', 'login.php', array(
                        'title' => 'Connexion',
                        'error' => $error
                    ));
                }

            }

        } else {
            return $this->render('layout.php', 'login.php', array(
                'title' => 'Connexion'
            ));

        }
    }

    public function home()
    {

        $listArticle = $this->getRepository('article')->findAll();

        return $this->render('layout.php', 'home.php', array(
            'title' => 'Accueil',
            'listArticle' => $listArticle
        ));
    }

    public function logout()
    {

        session_unset();
        session_destroy();

        $listArticle = $this->getRepository('article')->findAll();

        return $this->render('layout.php', 'home.php', array(
            'title' => 'Accueil',
            'listArticle' => $listArticle
        ));
    }


}