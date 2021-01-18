<?php
$articles = $data['articles'];
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

?>
<div class="container">
    <h1 class="mt-5 mb-0">Welcome in my blog,</h1>
    <h2 class="mt-0">Subtitle goes here.</h2>
    <div class="row align-items-start justify-content-center">
        <?php
        foreach ($articles as $article) { ?>
            <div class="col row justify-content-center my-1">
                <a href="index.php?page=article&id=<?= $article->id ?>" class="card m-1 no-text-decoration" style="width: 20rem;">
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
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-lg">
                <li class="page-item disabled">
                    <a class="page-link disabled" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="index.php?page=articles&start=1">1</a></li>
                <li class="page-item"><a class="page-link" href="index.php?page=articles&start=5">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>