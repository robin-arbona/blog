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
require '../classes/CategoriesManager.php';
require '../classes/CategoriesEntity.php';

if (isset($_GET['start'])) {
    $offset = $_GET['start'];
} else {
    $offset = 0;
}

if (isset($_GET['categorie'])) {
    $categorie = $_GET['categorie'];
} else {
    $categorie = NULL;
}

$articlesManager = new ArticlesManager;
$articles = $articlesManager->getArticlesList($offset, 5, $categorie);

$categoriesManager = new CategoriesManager;
$categories = $categoriesManager->getAll();

require_once('template/header.php');
?>

<div class="container">
    <h1 class="display-1 mt-5 mb-0">Welcome in my blog,</h1>
    <h2 class="display-4 mt-0">Subtitle goes here.</h2>
    <?php
    foreach ($categories as $categorie) { ?>
        <a href="<?= $categorie->getLink() ?>"><?= $categorie->nom ?></a>

    <?php }
    ?>
    <?php
    foreach ($articles as $article) { ?>
        <a href="<?= $article->getLink() ?>" class="row justify-content-center my-5 no-text-decoration">
            <img class="col-12 col-sm-4 centered-and-cropped centered-and-cropped--small" src="<?= $article->getImgPth() ?>" class="col" alt="...">

            <div class="col-12 col-sm-8">
                <h5 class="title"><?= $article->title ?> <span class="badge bg-secondary"><?= $article->categorie ?></span></h5>
                <p class="text"><?= $article->getExtract() ?></p>
                <p class="text"><small class="text-muted">Written by <?= $article->author ?> the <?= $article->date ?></small></p>
            </div>
        </a>
    <?php
    } ?>



</div>
<?php

require_once('template/footer.php');
