<?php

/**
 * Cette page contient les 3 derniers articles. En bas de la page, il doit y avoir un lien vers la page articles.
 */

$articles = $data['articles'];
?>
<div class="container">
    <h1 class="display-1 mt-5 mb-0">Welcome in my blog,</h1>
    <h2 class="display-4 mt-0">Subtitle goes here.</h2>
    <div class="row align-items-start justify-content-center">
        <?php
        foreach ($articles as $article) { ?>
            <div class="col row justify-content-center my-5">
                <a href="index.php?page=article&id=<?= $article->id ?>" class="card m-3 no-text-decoration" style="width: 20rem;">
                    <img class="centered-and-cropped" src="public/image/article_mainpic_<?= $article->id ?>.jpg" class="card-img-top" alt="...">

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