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

use App\App;
use App\Manager\ArticlesManager;
use App\Manager\CategoriesManager;
use App\Manager\PaginationManager;

require '../App/App.php';

$App = new App();

$ARTICLES_PER_PAGE = 5;

$id_droits = isset($_SESSION['id_droits']) ? $_SESSION['id_droits'] : 1;

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

$articlesManager = new ArticlesManager($App->getDb());

// Form handeler for deletion position is important, between instanciacion and article list request
if (isset($_GET['action']) && ($_GET['action'] == 'delete') && ($id_droits == 1337)) {
    $articlesManager->delete($_GET['id']);
}
$articles = $articlesManager->getArticlesList($offset, $ARTICLES_PER_PAGE, $categorie);
$categoriesManager = new CategoriesManager($App->getDb());
$categories = $categoriesManager->getAll();
$paginationManager = new PaginationManager($App->getDb(), $offset, $ARTICLES_PER_PAGE, $categorie);



require_once('template/header.php');
?>

<div class="container">
    <h1 class="display-3 mt-5 mb-0">Welcome in my blog,</h1>
    <h2 class="display-5 mt-0">Subtitle goes here.</h2>
    <?php
    foreach ($categories as $categorie) { ?>
        <a class="badge badge-primary" href="<?= $categorie->getLink() ?>"><?= $categorie->nom ?></a>

    <?php } ?>
    <a class="badge badge-secondary" href="articles.php">All</a>

    <?php
    foreach ($articles as $article) { ?>
        <a href="<?= $article->getLinkView() ?>" class="row justify-content-center mt-5 no-text-decoration">
            <img class="col-12 col-sm-4 centered-and-cropped centered-and-cropped--small" src="<?= $article->getImgPth() ?>" class="col" alt="...">

            <div class="col-12 col-sm-8">
                <h5 class="title"><?= $article->title ?> <span class="badge bg-secondary"><?= $article->categorie ?></span></h5>
                <p class="text"><?= $article->getExtract() ?></p>
                <p class="text"><small class="text-muted">Written by <?= $article->author ?> the <?= $article->date ?></small></p>

            </div>
        </a>
        <?php
        if ($id_droits == 1337) { ?>
            <div class="row justify-content-end">
                <?= $article->getBtnDelete() ?>
                <?= $article->getBtnEdit() ?>
            </div>
            <hr>
        <?php }
        ?>
    <?php
    } ?>

    <div class='row justify-content-center'>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item <?= $paginationManager->back_btn_active ? '' : 'disabled'; ?>">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>

                <?php
                for ($page = 1; $page <= $paginationManager->totalPageNb; $page++) { ?>
                    <li class="page-item <?= $page == $paginationManager->pageActive ? 'active' : '' ?>">
                        <a class="page-link" href="<?= $paginationManager->getLink($page) ?>"><?= $page ?></a>
                    </li>
                <?php }
                ?>
                <li class="page-item <?= $paginationManager->next_btn_active ? '' : 'disabled'; ?>">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>


</div>
<?php

require_once('template/footer.php');
