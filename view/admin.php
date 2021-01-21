<?php

/**
 * * - Une page d’administration (admin.php) :
 * Cette page permet aux administrateurs de gérer l’ensemble du site
 * (modification et suppression d’articles, création/modification et suppression
 * de catégories, d’utilisateurs, droits...)
 */

require_once('template/header.php');
require_once('../classes/Admin.php');
$modelAdmin = new Admin;
?>
<section>
    <p>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Edit Categorie
        </button>
    </p>
    <div class="collapse" id="collapseExample">
        <form method='post' action='admin.php' class="card card-body">
            <div class="form-group">
                <?=$modelAdmin->showCategorie() ?>
            </div>
        <button name="edit" type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
  
</section>
<?php
if(isset($_POST['edit']))
{
    var_dump($_POST['1']);
}
require_once('template/footer.php');
?>
