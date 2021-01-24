<?php
ob_start();
/**
 * * - Une page d’administration (admin.php) :
 * Cette page permet aux administrateurs de gérer l’ensemble du site
 * (modification et suppression d’articles, création/modification et suppression
 * de catégories, d’utilisateurs, droits...)
 */


require('../function/autoloader.php');
spl_autoload_register('myautoload');
// require '../classes/Manager.php';
// require '../classes/CategoriesManager.php';
// require '../classes/CategoriesEntity.php';

require_once('template/header.php');

$modelCategorie = new CategoriesManager();
$modeluser = new Test();
?>
<section>
    <p>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseEdit" aria-expanded="false" aria-controls="collapseEdit">
        Edit Categorie
        </button>
    </p>
    <div class="collapse" id="collapseEdit">
        <form method='post' action='admin.php' class="card card-body">
            <label for="categorie">Categorie :
                <select class="form-control" id="categorie" name="categorie">
                    <?= $modelCategorie->findAll()?>
                </select>
            </label>
            <label for="edite_categorie">
                <input type="text" name="edite_categorie">
            <label>
        <button name="edit" type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
    <p>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseDelete" aria-expanded="false" aria-controls="collapseDelete">
        Delete Categorie
        </button>
    </p>
    <div class="collapse" id="collapseDelete">
        <form method='post' action='admin.php' class="card card-body">
            <label for="categorie">Categorie :
                <select class="form-control" id="categorie" name="categorie">
                    <?= $modelCategorie->findAll()?>
                </select>
            </label>
        <button name="delete" type="submit" class="btn btn-primary">Delete</button>
        </form>
    </div>
    <p>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseAdd" aria-expanded="false" aria-controls="collapseAdd">
        Add Categorie
        </button>
    </p>
    <div class="collapse" id="collapseAdd">
        <form method='post' action='admin.php' class="card card-body">
            <label for="categorie">Categorie :
                <input class='form-control' type="text" name="categorie">
            </label>
        <button name="add" type="submit" class="btn btn-primary">Ajout</button>
        </form>
    </div>
    <p>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#edituser" aria-expanded="false" aria-controls="edituser">
        Edit Users
        </button>
    </p>
    <div class="collapse" id="edituser">
        <form method='post' action='admin.php' class="card card-body">
            <label for="categorie">User :
                <select class="form-control" id="categorie" name="categorie">
                <?= $modeluser->allUser()?>
                    
                </select>
            </label>
        <button name="edit_user" value='go' type="submit" class="btn btn-primary">Delete</button>
        </form>
    </div>
  
</section>
<?php
if(isset($_POST['edit']))
{
    
    $tab[] = $_POST;
    
    $categorie = $modelCategorie->findselected($tab);

    $edited = $_POST['edite_categorie'];

    $modelCategorie->edit($categorie,$edited);

    
}
elseif(isset($_POST['delete']))
{
    $tab[] = $_POST;
    $categorie = $modelCategorie->findselected($tab);
    $modelCategorie->delete($categorie);

}
elseif(isset($_POST['add']))
{
    $newCategorie = $_POST['categorie'];
    $modelCategorie->add($newCategorie);


}
elseif(isset($_POST['edit_user']))
{
    $tab[] = $_POST;
    $user = $modelCategorie->findselected($tab);
    $edit = $modeluser->edituser($user);
    if(!empty($edit) )
    {
        header('Location:profil.php');
    }
    
}

require_once('template/footer.php');
?>
