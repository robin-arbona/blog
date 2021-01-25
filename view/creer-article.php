<?php

/** - Une page permettant de créer des articles (creer-article.php) :
 * Cette page possède un formulaire permettant aux modérateurs et
 * administrateurs de créer de nouveaux articles. Le formulaire contient donc
 * le texte de l’article, une liste déroulante contenant les catégories existantes
 * en base de données et un bouton submit.
 */

use App\App;
use App\Manager\Admin;
use App\Manager\ArticlesManager;
use App\Manager\CategoriesManager;
use App\Special\UploadFileHandeler;

require '../App/App.php';

$App = new App;
$Admin = new Admin($App->getDb());

require_once('template/header.php');


$id_droits = $Admin->checkRight();

$id_utilisateur = isset($_SESSION['id']) ? $_SESSION['id'] : NULL;

$modelCategorie = new CategoriesManager($App->getDb());
$modelArticle = new ArticlesManager($App->getDb());

$edition = false;

if (isset($_GET['action']) && ($_GET['action'] == 'edit') && ($id_droits == 1337)) {
    $edition = true;
    $article = $modelArticle->getById($_GET['id']);
}


if (isset($_POST['add'])) {
    $id_categorie = $modelCategorie->findId($_POST['categorie']);

    $modelArticle->createArticle($_POST['titre'], $_POST['article'], $id_utilisateur, $id_categorie);
    $id_article = (int) $modelArticle->getLastId();

    new UploadFileHandeler($id_article);

    header("Location: article.php?id={$id_article}");
} elseif (isset($_POST['update'])) {
    $id_categorie = $modelCategorie->findId($_POST['categorie']);
    $id_article = (int) $_POST['id_article'];

    $modelArticle->update($id_article, $_POST['titre'], $_POST['article'], $id_utilisateur, $id_categorie);

    new UploadFileHandeler($id_article);

    header("Location: article.php?id={$id_article}");
}


?>
<section id='createarticle-section'>
    <form enctype="multipart/form-data" id='createarticle-form' method="post" action="creer-article.php">
        <div id='createarticle-top'>
            <label for="categorie">Categorie :
                <select class="form-control" id="categorie" name="categorie">
                    <?= $modelCategorie->findAll($article->id_categorie) ?>
                </select>
            </label>
            <label for="titre">Titre :
                <input class="form-control" type="text" placeholder="Titre" name="titre" value='<?= $edition ? $article->title : '' ?>'>
            </label>
        </div>
        <input type="file" name="article_mainpic" />
        <label id='createarticle-center' for="article">
            <textarea class="edit" id="article" name="article"><?= $edition ? $article->article : '' ?></textarea>
        </label>
        <input type="hidden" name="id_article" value='<?= $edition ? $article->id : NULL ?>'>
        <button type="submit" id=' bouton' class="btn btn-primary" name="<?= $edition ? 'update' : 'add' ?>"><?= $edition ? 'Update' : 'Publish' ?></button>
    </form>
</section>

<?php

require_once('template/footer.php');

?>