<?php

class Inscription
{

    public function insert_user()
    {
        $login = htmlspecialchars($_POST['login']);
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $email = htmlspecialchars($_POST['email']);


        $dsn = 'mysql:dbname=blog;host=localhost';
        $user = 'phpmyadmin';
        $pass = 'lecam';
        $db = new PDO($dsn,$user,$pass);
        $stmt=$db->prepare("INSERT INTO utilisateurs(login, password, email, id_droits) VALUES (:login,:password,:email,:id_droits)");
        $stmt->bindValue(':login',$login);
        $stmt->bindvalue(':password', $password);
        $stmt->bindValue(':email',$email);
        $stmt->bindValue(':id_droits',1);
        $stmt->execute();
        $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function new_user()
    {
        if (isset($_POST['sign-up'])) {

            if (!empty($login)){

            } else {
                $error = 'Please write down your login';
            }
            if (!empty($password)) {

            } else {
                $error = 'Please write down your password';
            }
            if (!empty($password2)) {

            } else {
                $error = 'Please confirm your password';
            }
            if (!empty($email)) {

            } else {
               $error = 'Please write down your email';
            }
            if (!empty($email2)) {

            } else {
                $error = 'Please confirm your email';
            }
            $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
            $password2 = password_verify($_POST['password2'],$password);
            $email = htmlspecialchars($_POST['email']);
            $email2 = htmlspecialchars($_POST['email2']);

            if($password == $password2 && $email == $email2){
                $this->insert_user();
                header("Location: connexion.php");
            }
        }
    }
}
