<?php
session_start();
/**
 * Le formulaire doit avoir deux inputs : “login” et “password”. Lorsque le
 * formulaire est validé, s’il existe un utilisateur en bdd correspondant à ces
 * informations, alors l’utilisateur devient connecté et une (ou plusieurs)
 * variables de session sont créées.
 */
require 'template/header.php';
require '../classes/UserLogIn.php';
$user_connection = new UserLogIn();
try {
    $user_connection->connection();
    }catch(Exception $e){
        echo $e->getMessage();
    }
?>

<form method="post">
    <div class="row d-flex justify-content-center">
    <div class=" col mb-3 ml-3">
        <label for="login" class="form-label">Login</label>
        <input name="login" type="text" class="form-control" id="login">
    </div>
    <div class=" col mb-3 mr-3">
        <label for="InputPassword" class="form-label">Password</label>
        <input name="password" type="password" class="form-control" id="InputPassword">
    </div>
    </div>
    <div class="d-flex justify-content-center">
        <button name="sign-in" type="submit" class="btn btn-primary ml-5 mb-5">Sign in</button>
    </div>
</form>
<?php
require 'template/footer.php';
