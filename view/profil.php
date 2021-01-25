<?php
session_start();

/**
 * Cette page possède un formulaire permettant à l’utilisateur de modifier 
 * l’ensemble de ses informations.
 */


require('../function/autoloader.php');
spl_autoload_register('myautoload');
// require '../classes/Manager.php';
// require '../classes/CategoriesManager.php';
// require '../classes/CategoriesEntity.php';
// require '../classes/ModifyProfilManager.php';
if (!isset($_SESSION['id'])) {
    header('Location: connexion.php');
}
$modify = new ModifyProfilManager();
try {
    $modify->modify_user();
} catch (Exception $e) {
    echo $e->getMessage();
}

require 'template/header.php';

?>

<form method="post" >
<div class=" mb-3">
    <label for="login" class="form-label">Login</label>
    <input name="login" type="text" class="form-control" id="login" value="<?php echo $_SESSION['login'] ?>">
    </div>
    <div class="mb-3">
        <label for="InputPassword" class="form-label" >Password</label>
        <input name="password" type="password" class="form-control" id="InputPassword">
    </div>
    <div class="mb-3">
        <label for="Password2" class="form-label"> Please confirm your password </label>
        <input name="password2" type="password" class="form-control" id="Password2">
    </div>
    <div class="mb-3">
        <label for="Email" class="form-label">Email address</label>
        <input name="email" type="email" class="form-control" id="Email" value="<?php echo $_SESSION['email']?>">
    </div>
    <div class="mb-3">
        <label for="email2" class="form-label">Please confirm your email address</label>
        <input name="email2" type="email" class="form-control" id="email2" value="<?php echo $_SESSION['email']?>">
    </div>
    <?php if (isset($_SESSION['id_droits']) && ($_SESSION['id_droits'] == 1337)){ ?>
    <div class="mb-3 ml-3 d-flex justify-content-center">
        <select name="power">
            <option>--utilisateur--modérateur--administrateur</option>
            <option name="utilisateur">1</option>
            <option name="moderateur">42</option>
            <option name="admin">1337</option>
        </select>
    </div>
    <?php }?>
    <button name="update" type="submit" class="btn btn-primary">Update</button>
</form>
<?php
require 'template/footer.php';
