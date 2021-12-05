<h1 style="text-align: center; margin-top: 100px " > <?= $article->getTitle() ?></h1>

<div style="background-color: lightgray; padding: 20px; border-radius: 25px; box-shadow:  10px 5px 5px lightgray;">
    <div style="margin-bottom: 50px">
        <p>Auteur : <?= $author['username']?></p><span> Date : <?= $article->getCreatedDate() ?></span>
    </div>

    <img src="upload/<?= $article->getPicture()?>" alt="" style="width: 300px">

    <div style="margin-top: 50px">
        <div>
            <h4>Contenu</h4>
            <p><?= $article->getContent() ?></p>
        </div>
        <?php
        if(isset($_SESSION['user'])){
            if($_SESSION['user']->getId() == $article->getAuthorId()){ ?>
        <div>
            <a href="<?php echo BASE_URL ?>?action=delArticle&id=<?= $article->getId()?>" class="btn btn-primary">Supprimer</a>
        </div>
        <?php }
        }?>

    </div>
</div>

<div style="background-color: lightgray; padding: 20px; border-radius: 25px; box-shadow:  10px 5px 5px lightgray; margin-top: 20px">
    <h4>Commentaire</h4>
    <?php
        if(!empty($listReview)){
            foreach ($listReview as $review){?>
                <hr>
            <div style="display: flex; justify-content: space-between">
                <p><?= $review->getContent() ?></p>
                <div style="display: flex;">
                    <p style="margin-right: 15px"><?= $review->getCreatedDate() ?></p>
                    <p><?=  $review->username ?></p>
                </div>
            </div>
                <hr>
    <?php
            }
        }else{?>
        <h1>Pas de commentaire</h1>
    <?php
        }
    ?>
    <p></p>
</div>


<?php if(isset($_SESSION['user'])){ ?>
<div style="background-color: lightgray; padding: 20px; border-radius: 25px; box-shadow:  10px 5px 5px lightgray; margin-top: 20px">
    <h4>Formulaire commentaire</h4>
    <form method='post' action="<?php echo BASE_URL ?>?action=addReview">

        <div class="mb-3">
            <input type="text" name='content' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre commentaire">
            <input id="article_id" name="article_id" type="hidden" value="<?= $article->getId() ?>">
        </div>

        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>
<?php } ?>


