<?php


/** - Une page contenant un article et ses commentaires (article.php) :
 * Cette page permet de voir un article, l’ensemble des commentaires
 * associés et la possibilité d’en ajouter un nouveau. Il faut utiliser l’argument
 * GET “id” afin de sélectionner l’article souhaité.
 * ex : https://localhost/blog/article.php/?id=1
 * */

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('Location: index.php?404');
}

require '../classes/Manager.php';
require '../classes/ArticlesManager.php';
require '../classes/ArticlesEntity.php';
require '../classes/CommentairesManager.php';
require '../classes/CommentairesEntity.php';

$articlesManager = new ArticlesManager;
$article = $articlesManager->getById($id);

$commentairesManager = new CommentairesManager;
$commentaires = $commentairesManager->getAllByArticleId($id);


require_once('template/header.php');

?>

<div class="container">
    <img class="img-fluid" src="../public/image/article_mainpic_<?= $article->id ?>.jpg" alt="...">
    <h1 class="display-1 mt-5 mb-0"><?= $article->title; ?></h1>
    <p><?= $article->article; ?></p>
    <h2>Commentaires</h2>
    <?php
    foreach ($commentaires as $commentaire) { ?>
        <div class="alert alert-secondary" role="alert">
            <p class="text"><?= $commentaire->content ?></p>
            <p class="text"><small class="text-muted">Written by <?= $commentaire->author ?> the <?= $commentaire->date ?></small></p>
        </div>

    <?php }
    ?>

</div>
<?php

require_once('template/footer.php');
