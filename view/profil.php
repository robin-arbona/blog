<?php

/**
 * Cette page possède un formulaire permettant à l’utilisateur de modifier 
 * l’ensemble de ses informations.
 */

use App\App;
use App\Manager\ModifyProfilManager;

require '../App/App.php';

$App = new App();

if (!isset($_SESSION['id'])) {
    header('Location: connexion.php');
}

$modify = new ModifyProfilManager($App->getDb());
try {
    if (isset($_SESSION['id']) && !(isset($_GET['action']) && $_GET['action'] == 'edit' && $_SESSION['id_droits'] == 1337 && isset($_GET['id_utilisateur']))) {
        $id = $_SESSION['id'];
    } else {
        $id = $_GET['id_utilisateur'];
    }
    $modify->modify_user($id);
} catch (Exception $e) {
    echo $e->getMessage();
}

require 'template/header.php';

if (isset($_GET['action']) && $_GET['action'] == 'edit' && $_SESSION['id_droits'] == 1337 && isset($_GET['id_utilisateur'])) {
    $userdata = $modify->getUserById($_GET['id_utilisateur']);
    $login = $userdata['login'];
    $email = $userdata['email'];
    $id_droits = $userdata['id_droits'];
} else {
    $login = $_SESSION['login'];
    $email = $_SESSION['email'];
    $id_droits = $_SESSION['id_droits'];
}


?>

<div class="row justify-content-center m-2">
    <form class="col-6" method="post">
        <div class=" mb-3">
            <label for="login" class="form-label">Login</label>
            <input name="login" type="text" class="form-control" id="login" value="<?php echo $login ?>">
        </div>
        <div class="mb-3">
            <label for="InputPassword" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="InputPassword">
        </div>
        <div class="mb-3">
            <label for="Password2" class="form-label"> Please confirm your password </label>
            <input name="password2" type="password" class="form-control" id="Password2">
        </div>
        <div class="mb-3">
            <label for="Email" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="Email" value="<?php echo $email ?>">
        </div>
        <div class="mb-3">
            <label for="email2" class="form-label">Please confirm your email address</label>
            <input name="email2" type="email" class="form-control" id="email2" value="<?php echo $email ?>">
        </div>
        <?php if (isset($_SESSION['id_droits']) && ($_SESSION['id_droits'] == 1337)) { ?>
            <div class="mb-3">
                <label for="power" class="form-label">User's right</label>
                <select class="form-control" name="power">
                    <option <?= $id_droits == 1 ? 'selected' : '' ?> name="utilisateur" value="1">Utilisateur</option>
                    <option <?= $id_droits == 42 ? 'selected' : '' ?> name="moderateur" value='42'>Moderateur</option>
                    <option <?= $id_droits == 1337 ? 'selected' : '' ?> name="admin" value='1337'>Administrateur</option>
                </select>
            </div>
        <?php } ?>
        <button name="update" type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<?php
require 'template/footer.php';
