<?php

class modify_profil
{
    public function modify_user()
    {
        session_start();
        if (isset($_SESSION['id']))
        {
            if (isset($_POST['update']))
            {
            $id = $_SESSION['id'];
            $login = htmlspecialchars($_POST['login']);
            $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
            $password2 = password_verify($_POST['password2'],$password);
            $email = htmlspecialchars($_POST['email']);
            $email2 = htmlspecialchars($_POST['email2']);

             if(!empty($login) && !empty($password) && !empty($password2) && !empty($email) && !empty($email2) && $password == $password2 && $email == $email2)
            {
                $dsn = 'mysql:dbname=blog;host=localhost';
                $user = 'root';
                $pass = '';
                $db = new PDO($dsn,$user,$pass);

                $stmt = $db->prepare("SELECT * FROM utilisateurs WHERE id = :id");
                $stmt->bindValue(':id', $id);
                $stmt->execute();


                    if ($stmt->rowCount() == 1)
                    {
                        $query = $db->prepare("UPDATE utilisateurs SET login = :login, password = :password, email = :email, id_droits = :id_droits WHERE id= :id");
                        $query->bindValue(':login', $login);
                        $query->bindValue(':password', $password);
                        $query->bindValue(':email', $email);
                        $query->bindValue(':id_droits',1);
                        $query->bindValue(':id', $id);
                        $query->execute();
                    }
                }
            }
        }
    }
}