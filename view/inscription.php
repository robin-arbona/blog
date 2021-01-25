<?php

/**
 * Le formulaire doit contenir l’ensemble des champs présents dans la table
 * “utilisateurs” ainsi qu’une confirmation de mot de passe. Dès qu’un utilisateur 
 * remplit ce formulaire, les données sont insérées dans la base de
 * données et l’utilisateur est dirigé vers la page de connexion.
 */

use App\App;
use App\Manager\UserSignUpManager;

require '../App/App.php';

$App = new App();

$user = new UserSignUpManager($App->getDb());

if (isset($_POST['sign-up'])) {
    try {
        $user->new_user();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
require_once('template/header.php');

?>

<div>
    <form method="post">
        <div class="d-flex justify-content-center mt-5">
            <div class=" form-group w-25 ">
                <label for="login" class="form-label ">Login</label>
                <input name="login" type="text" class="form-control" id="login">
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="row">
                <div class="mb-3 ml-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password">
                </div>
                <div class="mb-3 ml-3">
                    <label for="Password2" class="form-label"> Please confirm your password </label>
                    <input name="password2" type="password" class="form-control" id="Password2">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="row">
                <div class="mb-3 ml-3">
                    <label for="Email" class="form-label">Email address</label>
                    <input name="email" type="email" class="form-control" id="Email">
                </div>
                <div class="mb-3 ml-3 ">
                    <label for="email2" class="form-label">Please confirm your email address</label>
                    <input name="email2" type="email" class="form-control" id="email2">
                </div>
            </div>
        </div>
        <?php if (isset($_SESSION['id_droits']) && ($_SESSION['id_droits'] == 1337)) { ?>
            <div class="mb-3 ml-3 d-flex justify-content-center">
                <select name="power">
                    <option name="utilisateur" value="1">Utilisateur</option>
                    <option name="moderateur" value="42">Modérateur</option>
                    <option name="admin" value="1337">Administrateur</option>
                </select>
            </div>
        <?php } ?>
        <div class="d-flex justify-content-center">
            <button name="sign-up" type="submit" class="btn btn-primary mb-5">Sign up</button>
        </div>
    </form>

    <?php require 'template/footer.php';
