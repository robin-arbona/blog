<?php

/**
 * Cette page contient les 3 derniers articles. En bas de la page, il doit y avoir un lien vers la page articles.
 */

?>
<div class="container">
    <h1 class="display-1">Welcome</h1>
    <div class="row align-items-start justify-content-center">
        <?php
        foreach ($articles as $article) { ?>
            <div class="col border justify-content-center">
                <div class="card" style="width: 18rem;">
                    <img src="public/image/article_mainpic_<?= $article->id ?>.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $article->title ?></h5>
                        <p class="card-text"><?= $article->getExtract() ?></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        <?php
        } ?>
    </div>
</div>