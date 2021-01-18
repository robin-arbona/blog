<?php

/**
 * Le formulaire doit avoir deux inputs : “login” et “password”. Lorsque le
 * formulaire est validé, s’il existe un utilisateur en bdd correspondant à ces
 * informations, alors l’utilisateur devient connecté et une (ou plusieurs)
 * variables de session sont créées.
 */
?>

<form method="post">
    <div class="mb-3">
        <label for="login" class="form-label">Login</label>
        <input type="text" class="form-control" id="login">
    </div>
    <div class="mb-3">
        <label for="InputPassword" class="form-label">Password</label>
        <input name="password" type="password" class="form-control" id="InputPassword">
    </div>
    <button name="sign-in" type="submit" class="btn btn-primary">Sign in</button>
</form>
