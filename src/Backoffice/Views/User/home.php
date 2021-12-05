
<div style="display: flex">
<?php
    if(!empty($listArticle)){
        foreach ($listArticle as $article){



?>
    <div style="padding: 20px">
        <div class="card" style="width: 18rem;">
            <img src="upload/<?php  echo $article->getPicture() ?>" class="card-img-top" alt="<?php echo $article->getPicture()?> ">
            <div class="card-body">
                <h5 class="card-title"><?php echo $article->getTitle()?></h5>
                <p class="card-text"><?php echo $article->getContent()?></p>
                <a href="<?php echo BASE_URL ?>?action=showArticle&id=<?php echo $article->getId()?>" class="btn btn-primary">Consulter</a>
            </div>
        </div>
    </div>

<?php
        }
    }else{


?>
    <h1>Pas d'article</h1>
    <?php
    }?>
</div>
