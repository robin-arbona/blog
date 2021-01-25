<?php

namespace App\Manager;

use core\Manager;
use \Exception;
use \PDO;

class UserLogInManager extends Manager
{

    public function connection()
    {
        if (isset($_POST['sign-in'])) {
            $error = [];
            if (empty($_POST['login'])) {
                $error[] = 'Please write down your login';
            }
            if (empty($_POST['password'])) {
                $error[] = 'Please write down your password';
            }
            if (!empty($error)) {
                throw new Exception(implode(' ', $error));
            }
            $this->user_in_db();
        }
    }

    public function user_in_db()
    {

        $stmt = $this->db->prepare("SELECT * FROM utilisateurs WHERE login =?");
        $stmt->bindValue(1, $_POST['login']);
        $stmt->execute();
        $tab = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) {
            if (password_verify($_POST['password'], $tab['password'])) {
                $_SESSION['login'] = $tab['login'];
                $_SESSION['id'] = $tab['id'];
                $_SESSION['id_droits'] = $tab['id_droits'];
                $_SESSION['email'] = $tab['email']; //Ajout pour la page admin

                header("Location: articles.php");
            }
        }
    }
}
