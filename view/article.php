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

$articlesManager = new ArticlesManager;
$article = $articlesManager->getById($id);


require_once('template/header.php');

?>

<div class="container">
    <h1 class="display-1 mt-5 mb-0">Welcome in my blog,</h1>
    <h2 class="display-4 mt-0">Subtitle goes here.</h2>
    <?php var_dump($article); ?>


</div>
<?php

require_once('template/footer.php');
