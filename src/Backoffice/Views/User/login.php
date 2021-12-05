<?php if(!isset($_SESSION['user'])){ ?>
    <form method='post' action="<?php echo BASE_URL ?>?action=login">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Adresse email</label>
            <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" name='password' class="form-control" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
<?php }else{
?>
    <a href="<?php echo BASE_URL ?>" class="btn btn-primary">Retour à l'accueil</a>

<?php }?>