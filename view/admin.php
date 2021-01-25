<?php
ob_start();
/**
 * * - Une page d’administration (admin.php) :
 * Cette page permet aux administrateurs de gérer l’ensemble du site
 * (modification et suppression d’articles, création/modification et suppression
 * de catégories, d’utilisateurs, droits...)
 */

use App\App;
use App\Manager\Admin;
use App\Manager\CategoriesManager;

require '../App/App.php';
$App = new App();

$modelCategorie = new CategoriesManager($App->getDb());
$modelAdmin = new Admin($App->getDb());
$id_droits = $modelAdmin->checkRight();

$modelAdmin->form();

require_once('template/header.php');

?>
<div class="row justify-content-center m-5 vh75">
    <section class="col-6">
        <p>
            <button class="btn btn-primary w-100" type="button" data-toggle="collapse" data-target="#collapseEdit" aria-expanded="false" aria-controls="collapseEdit">
                Edit Categorie
            </button>
        </p>
        <div class="collapse" id="collapseEdit">
            <form method='post' action='admin.php' class="card card-body">
                <label for="categorie">Categorie :
                    <select class="form-control" id="categorie" name="categorie">
                        <?= $modelCategorie->findAll() ?>
                    </select>
                </label>
                <label for="edite_categorie">
                    <input type="text" name="edite_categorie">
                    <label>
                        <button name="edit" type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
        <p>
            <button class="btn btn-primary w-100" type="button" data-toggle="collapse" data-target="#collapseDelete" aria-expanded="false" aria-controls="collapseDelete">
                Delete Categorie
            </button>
        </p>
        <div class="collapse" id="collapseDelete">
            <form method='post' action='admin.php' class="card card-body">
                <label for="categorie">Categorie :
                    <select class="form-control" id="categorie" name="categorie">
                        <?= $modelCategorie->findAll() ?>
                    </select>
                </label>
                <button name="delete" type="submit" class="btn btn-primary">Delete</button>
            </form>
        </div>
        <p>
            <button class="btn btn-primary w-100" type="button" data-toggle="collapse" data-target="#collapseAdd" aria-expanded="false" aria-controls="collapseAdd">
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
            <button class="btn btn-primary w-100" type="button" data-toggle="collapse" data-target="#edituser" aria-expanded="false" aria-controls="edituser">
                Edit Users
            </button>
        </p>
        <div class="collapse" id="edituser">
            <form method='post' action='admin.php' class="card card-body">
                <label for="categorie">User :
                    <select class="form-control" id="categorie" name="categorie">
                        <?= $modelAdmin->allUser() ?>

                    </select>
                </label>
                <button name="edit_user" value='go' type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
        <p>
            <button class="btn btn-primary w-100" type="button" data-toggle="collapse" data-target="#createuser" aria-expanded="false" aria-controls="createuser">
                Create Users
            </button>
        </p>
        <div class="collapse" id="createuser">
            <form method='post' action='admin.php' class="card card-body">
                <button name="creatuser" value='create' type="submit" class="btn btn-primary">Go</button>
            </form>
        </div>

    </section>
</div>
<?php

require_once('template/footer.php');
?>