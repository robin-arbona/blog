<?php

/** - Une page contenant un article et ses commentaires (article.php) :
 * Cette page permet de voir un article, l’ensemble des commentaires
 * associés et la possibilité d’en ajouter un nouveau. Il faut utiliser l’argument
 * GET “id” afin de sélectionner l’article souhaité.
 * ex : https://localhost/blog/article.php/?id=1
 * */

use App\App;
use App\Manager\ArticlesManager;
use App\Manager\CommentairesManager;

require '../App/App.php';
$App = new App;


if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('Location: index.php?404');
}

$articlesManager = new ArticlesManager($App->getDb());
$article = $articlesManager->getById($id);

$commentairesManager = new CommentairesManager($App->getDb());

$id_droits = isset($_SESSION['id_droits']) ? $_SESSION['id_droits'] : 1;

if (isset($_POST['commentaire']) && isset($_SESSION['id'])) {
    $commentairesManager->add($_POST['commentaire'], $id, $_SESSION['id']);
} elseif (isset($_POST['commentaireEdit']) && ($id_droits == 42 || $id_droits == 1337)) {
    $commentairesManager->update($_POST['cmt_id'], $_POST['commentaireEdit']);
    header("Location: article.php?id=$id");
}

if (isset($_GET['action']) && ($_GET['action'] == 'delete') && ($id_droits == 42 || $id_droits == 1337)) {
    $commentairesManager->delete($_GET['cmt_id']);
}

$commentaires = $commentairesManager->getAllByArticleId($id);

require_once('template/header.php');

?>

<div class="container">
    <img class="centered-and-cropped--height" src="../public/image/article_mainpic_<?= $article->id ?>.jpg" alt="...">
    <h1 class="display-1 mt-5 mb-0"><?= $article->title; ?></h1>
    <p><?= $article->article; ?></p>
    <?php
    if ($id_droits == 1337) { ?>
        <div class="row justify-content-end">
            <?= $article->getBtnDelete() ?>
            <?= $article->getBtnEdit() ?>
        </div>
        <hr>
    <?php } ?>

    <h2>Commentaires</h2>
    <div class="row justify-content-center">
        <?php
        if (isset($_SESSION['id'])) { ?>
            <form class="col-8 alert alert-secondary" method="POST">
                <div class="form-group">
                    <label for='commentaire'><?= isset($_GET['action']) && $_GET['action'] == 'edit' ? "Edit comment from {$commentairesManager->getById($_GET['cmt_id'])->id_utilisateur} posted {$commentairesManager->getById($_GET['cmt_id'])->date}" : 'Post new comment'; ?></label>
                    <textarea name="commentaire<?= isset($_GET['action']) && $_GET['action'] == 'edit' ? 'Edit' : ''; ?>" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= isset($_GET['action']) && $_GET['action'] == 'edit' ? $commentairesManager->getById($_GET['cmt_id'])->commentaire : ''; ?></textarea>
                    <input type="hidden" name="cmt_id" value=<?= isset($_GET['action']) && $_GET['action'] == 'edit' ? $_GET['cmt_id'] : ''; ?>>
                </div>
                <input class="btn <?= isset($_GET['action']) && $_GET['action'] == 'edit' ? 'btn-warning' : 'btn-primary'; ?> btn-lg btn-block" type="submit" value="<?= isset($_GET['action']) && $_GET['action'] == 'edit' ? 'Edit' : 'Poster'; ?>">
            </form>

        <?php } ?>

        <?php
        foreach ($commentaires as $commentaire) { ?>
            <div class="col-8 alert alert-secondary" role="alert">
                <p class="text"><?= $commentaire->commentaire ?></p>
                <p class="text"><small class="text-muted">Written by <?= $commentaire->login ?> the <?= $commentaire->date ?></small></p>
                <?= ($id_droits == 42 || $id_droits == 1337) ?  $commentaire->getLinkEdit()  : '' ?>
                <?= ($id_droits == 42 || $id_droits == 1337) ? $commentaire->getLinkDelete()  : '' ?>
            </div>

        <?php }
        ?>
    </div>
</div>
<?php

require_once('template/footer.php');
