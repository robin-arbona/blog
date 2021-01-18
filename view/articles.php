<?php

/**
 * Sur cette page, les utilisateurs peuvent voir l’ensemble des articles, triés du
 * plus récents au plus anciens. S’il y a plus de 5 articles, seuls les 5 premiers
 * sont affichés et un système de pagination permet d’afficher les 5 suivants
 * (ou les 5 précédents). Pour cela, il faut utiliser l’argument GET “start”.
 * ex : https://localhost/blog/articles.php/?start=5 affiche les articles 6 à 10.
 * La page articles peut également filtrer les articles par catégorie à l’aide de
 * l’argument GET “categorie” qui utilise les id des categories.
 * ex : https://localhost/blog/articles.php/?categorie=1&start=10 affiche les
 * articles 11 à 15 ayant comme id_categorie 1).
 */

require '../classes/Manager.php';
require '../classes/ArticlesManager.php';
require '../classes/ArticlesEntity.php';

if (isset($_GET['start'])) {
    $offset = $_GET['start'];
} else {
    $offset = 0;
}

$articlesManager = new ArticlesManager;
$articles = $articlesManager->getByXWithOffset($offset, 5);

require_once('template/header.php');

?>

<div class="container">
    <h1 class="display-1 mt-5 mb-0">Welcome in my blog,</h1>
    <h2 class="display-4 mt-0">Subtitle goes here.</h2>
    <div class="row align-items-start justify-content-center">
        <?php
        foreach ($articles as $article) { ?>
            <div class="col row justify-content-center my-5">
                <a href="article.php?id=<?= $article->id ?>" class="card m-3 no-text-decoration" style="width: 20rem;">
                    <img class="centered-and-cropped" src="../public/image/article_mainpic_<?= $article->id ?>.jpg" class="card-img-top" alt="...">

                    <div class="card-body">
                        <h5 class="card-title"><?= $article->title ?></h5>
                        <p class="card-text"><?= $article->getExtract() ?></p>
                        <p class="card-text"><small class="text-muted">Written the <?= $article->date ?></small></p>
                    </div>
                </a>
            </div>
        <?php
        } ?>
    </div>

    <div class="row align-items-start justify-content-center">
        <a class="page-link" href="index.php?page=articles&start=1">More</a>
    </div>

</div>
<?php

require_once('template/footer.php');
