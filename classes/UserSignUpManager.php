<?php

class UserSignUpManager extends Manager
{

    /*
     * Insert value from form onto db and add input if user is admin;
     */
    public function insert_user()
    {
        $login = htmlspecialchars($_POST['login']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $email = htmlspecialchars($_POST['email']);
        $id_droits = 1;
        if(isset($_SESSION['id_droits']) == 1337){
            $id_droits = $id_droits_new_user = $_POST['power'];
        }
        $stmt = $this->db->prepare("INSERT INTO utilisateurs(login, password, email, id_droits) VALUES (:login,:password,:email,:id_droits)");
        $stmt->bindValue(':login', $login);
        $stmt->bindvalue(':password', $password);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':id_droits', $id_droits);
        $stmt->execute();
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
                        $error[]= 'Please write down your login';
                    }
                    if (empty($password)) {
                        $error[]= 'Please write down your password';
                    }
                    if (empty($password2)) {
                        $error[] = 'Please confirm your password';
                    }
                    if (empty($email)) {
                        $error[] = 'Please write down your email';
                    }
                    if (empty($email2)) {
                       $error[] = 'Please confirm your email';
                    }
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $password2 = password_verify($_POST['password2'], $password);
                    $email = htmlspecialchars($_POST['email']);
                    $email2 = htmlspecialchars($_POST['email2']);

                    if(!empty($error)){
                        throw new Exception(implode(' ',$error));
                    }
                    if ($password == $password2 && $email == $email2 && $id_droits = 1)  {
                        $this->insert_user();
                        header("Location: connexion.php");
                    }
                }
    }
}
