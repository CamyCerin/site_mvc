<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
<style>li>a{
    font-size: x-large;
} </style>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Projet MVC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL ?>">Accueil</a>
                    </li>
                    <?php if(isset($_SESSION['user'])){ ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL ?>?action=addArticle">Ajout Article</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL ?>?action=logout">Déconnexion</a>
                        </li>
                    <?php } ?>
                    <?php if(!isset($_SESSION['user'])){ ?>
                    <li class="nav-item">

                        <a class="nav-link" href="<?php echo BASE_URL ?>?action=registration">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL ?>?action=login">Connexion</a>
                    </li>
                    <?php } ?>
                    
                </ul>
                <div class="d-flex my-end">
<!--                <div class="nav-item dropdown">-->
<!--                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">-->
<!--                            Dropdown link-->
<!--                        </a>-->
<!--                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">-->
<!--                            <li><a class="dropdown-item" href="#">Action</a></li>-->
<!--                            <li><a class="dropdown-item" href="#">Another action</a></li>-->
<!--                            <li><a class="dropdown-item" href="#">Something else here</a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
    </nav>
    <div class="container">
        <div class="row text-center mt-4">
            <h1><?php echo $title ?></h1>
        </div>
        <?php  if(isset($error)):   ?>
        <div class="row alert alert-danger w-50 text-center mt-4">
            <h5><?php echo $error ?></h5>
        </div>
        <?php  endif;   ?>
        <?php  if(isset($success)):   ?>
        <div class="row alert alert-success w-50 text-center mt-4">
            <h5><?php echo $success ?></h5>
        </div>
        <?php  endif;   ?>
        <?php echo $content ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>