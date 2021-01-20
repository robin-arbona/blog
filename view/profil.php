<?php

/**
 * Cette page possède un formulaire permettant à l’utilisateur de modifier 
 * l’ensemble de ses informations.
 */
require 'template/header.php';
require '../classes/ModifyProfil.php';

$modify = new ModifyProfil();
try{
    $modify->modify_user();
}catch (Exception $e){
    echo $e->getMessage();
}


?>

<form method="post" ">
<div class="mb-3">
    <label for="login" class="form-label">Login</label>
    <input name="login" type="text" class="form-control" id="login">
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
    <input name="email" type="email" class="form-control" id="Email">
</div>
<div class="mb-3">
    <label for="email2" class="form-label">Please confirm your email address</label>
    <input name="email2" type="email" class="form-control" id="email2">
</div>
<button name="update" type="submit" class="btn btn-primary">Update</button>
</form>