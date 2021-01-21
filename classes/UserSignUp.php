<?php

class UserSignUp
{

    public function insert_user()
    {
        $login = htmlspecialchars($_POST['login']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $email = htmlspecialchars($_POST['email']);


        $dsn = 'mysql:dbname=blog;host=localhost';
        $user = 'phpmyadmin';
        $pass = 'lecam';
        $db = new PDO($dsn, $user, $pass);
        $stmt = $db->prepare("INSERT INTO utilisateurs(login, password, email, id_droits) VALUES (:login,:password,:email,:id_droits)");
        $stmt->bindValue(':login', $login);
        $stmt->bindvalue(':password', $password);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':id_droits', 1);
        $stmt->execute();
        $stmt->fetch(PDO::FETCH_OBJ);
    }


    public function new_user()
    {
        $login = htmlspecialchars($_POST['login']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $password2 = $_POST['password2'];
        $email = htmlspecialchars($_POST['email']);
        $email2 = $_POST['email2'];

                if (isset($_POST['sign-up'])){
                    $error = [];

                    if (empty($login)) {
                        $error[]= 'Please write down your login';//throw new Exception('Please write down your login');
                    }
                    if (empty($password)) {
                        $error[]= 'Please write down your password';//throw new Exception('Please write down your password');
                    }
                    if (empty($password2)) {
                        $error[] = 'Please confirm your password';//throw new Exception('Please confirm your password');
                    }
                    if (empty($email)) {
                        $error[] = 'Please write down your email';//throw new Exception('Please write down your email');
                    }
                    if (empty($email2)) {
                       $error[] = 'Please confirm your email';//throw new Exception('Please confirm your email');
                    }
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $password2 = password_verify($_POST['password2'], $password);
                    $email = htmlspecialchars($_POST['email']);
                    $email2 = htmlspecialchars($_POST['email2']);

                    if(!empty($error)){
                        throw new Exception(implode(' ',$error));
                    }
                    if ($password == $password2 && $email == $email2) {
                        $this->insert_user();
                        header("Location: connexion.php");
                    }
                }
    }
}
