<?php

/**
 * Cette page contient les 3 derniers articles. En bas de la page, il doit y avoir un lien vers la page articles.
 */

use App\App;
use App\Manager\ArticlesManager;

require '../App/App.php';

$App = new App();

$articlesManager = new ArticlesManager($App->getDb());
$articles = $articlesManager->getLast(3);

require_once('template/header.php');

?>

<div class="container">
    <h1 class="display-1 mt-5 mb-0">Welcome in my blog,</h1>
    <h2 class="display-4 mt-0">Subtitle goes here.</h2>
    <div class="row align-items-start justify-content-center">
        <?php
        foreach ($articles as $article) { ?>
            <div class="col row justify-content-center my-5">
                <a href="<?= $article->getLinkView() ?>" class="card m-3 no-text-decoration" style="width: 20rem;">
                    <img class="centered-and-cropped" src="<?= $article->getImgPth() ?>" class="card-img-top" alt="...">

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

    <div class="row align-items-start justify-content-center m-5">
        <a class="col-6 page-link text-center bg-primary text-white rounded" href="articles.php">More articles</a>
    </div>

</div>
<?php

require_once('template/footer.php');
