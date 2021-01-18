<?php

$article = $data['article'];
/** - Une page contenant un article et ses commentaires (article.php) :
 * Cette page permet de voir un article, l’ensemble des commentaires
 * associés et la possibilité d’en ajouter un nouveau. Il faut utiliser l’argument
 * GET “id” afin de sélectionner l’article souhaité.
 * ex : https://localhost/blog/article.php/?id=1
 * */

?>
<img src="public/image/article_mainpic_<?= $article->id ?>.jpg" class="img-fluid" alt="...">
<div class="container">
    <h1><?= $article->title ?> </h1>
    <h2>category <?= $article->id_categorie ?> user <?= $article->id_utilisateur ?></h2>

    <h3><?= $article->date ?></h3>

    <p><?= $article->article ?></p>


</div>