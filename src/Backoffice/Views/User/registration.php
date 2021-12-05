<form method='post' action="<?php echo BASE_URL ?>?action=registration">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nom d'utilisateur</label>
        <input type="text" name='username' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Adresse Mail</label>
        <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
        <input type="password" name='password' class="form-control" id="exampleInputPassword1">
    </div>

    <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>