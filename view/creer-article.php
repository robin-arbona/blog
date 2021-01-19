<?php



/** - Une page permettant de créer des articles (creer-article.php) :
 * Cette page possède un formulaire permettant aux modérateurs et
 * administrateurs de créer de nouveaux articles. Le formulaire contient donc
 * le texte de l’article, une liste déroulante contenant les catégories existantes
 * en base de données et un bouton submit.
 */
require_once('template/header.php');
require_once('../classes/Categorie.php');
require_once('../classes/Article.php');

$modelCategorie = new Categorie;
$modelArticle = new Article;


?>
<section id='createarticle-section'>
    <form id='createarticle-form' method="post" action="creer-article.php">
        <div id='createarticle-top'>
            <label for="categorie">Categorie :
                <select class="form-control" id="categorie" name="categorie">
                    <?= $modelCategorie->findAll()?>
                </select>
            </label>
            <label for="titre">Titre :
                <input class="form-control" type="text" placeholder="Titre" name="titre">
            </label>
        </div>
        <label id='createarticle-center' for="article">
            <textarea class="edit" id="article" name="article"></textarea>
        </label>
        <button type="submit" id='bouton' class="btn btn-primary">Publier</button>

    </form>
</section>

<?php 


$id = $modelCategorie->findId();
$modelArticle->createArticle($_POST['titre'],$_POST['article'],2,$id);





require_once('template/footer.php'); 

      
?>



