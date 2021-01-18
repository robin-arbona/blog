<?php



/** - Une page permettant de créer des articles (creer-article.php) :
 * Cette page possède un formulaire permettant aux modérateurs et
 * administrateurs de créer de nouveaux articles. Le formulaire contient donc
 * le texte de l’article, une liste déroulante contenant les catégories existantes
 * en base de données et un bouton submit.
 */
require_once('template/header.php');
require_once('../classes/Categorie.php');

$object = new Categorie;

?>
<form class=" g-3" style='border: solid black' method="post" action="creer-article.php">
    <div class="form-group">
        <label for="categorie">Categorie :
            <select class="form-control" id="categorie" name="categorie">
                <?= $object->getAll()?>
            </select>
        </label>
        <label for="titre">
            <input class="form-control form-control-lg" type="text" placeholder="Titre" aria-label=".form-control-lg example" name="titre">
        </label>
        <label for="article">
            <textarea class="form-control" id="article" name="article" rows="3"></textarea>
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Publier</button>

</form>

<?php 

var_dump($_POST['categorie']);

require_once('template/footer.php'); 

      
?>



