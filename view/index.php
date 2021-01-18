<?php

/**
 * Cette page contient les 3 derniers articles. En bas de la page, il doit y avoir un lien vers la page articles.
 */

require '../classes/Manager.php';
require '../classes/ArticlesManager.php';
require '../classes/ArticlesEntity.php';

$articlesManager = new ArticlesManager;
$articles = $articlesManager->getLast(3);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="../public/css/style.css" rel="stylesheet">
    <title>Mon blog</title>
</head>

<body>
    <?php require 'template/header.php'; ?>

    <div class="container">
        <h1 class="display-1 mt-5 mb-0">Welcome in my blog,</h1>
        <h2 class="display-4 mt-0">Subtitle goes here.</h2>
        <div class="row align-items-start justify-content-center">
            <?php
            foreach ($articles as $article) { ?>
                <div class="col row justify-content-center my-5">
                    <a href="article.php/?id=<?= $article->id ?>" class="card m-3 no-text-decoration" style="width: 20rem;">
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

    <?php require 'template/footer.php'; ?>

</body>

</html>