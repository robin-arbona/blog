<?php

namespace App\Manager;

use core\Manager;
use \Exception;
use \PDO;


class ModifyProfilManager extends Manager
{
    public function modify_user($id)
    {
        if ($id) {
            if (isset($_POST['update'])) {

                if (isset($_POST['power'])) {
                    $droit = $_POST['power'];
                }                                 //Ajout pour admin
                else {
                    $droit = 1;
                }

                $login = htmlspecialchars($_POST['login']);
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $password2 = password_verify($_POST['password2'], $password);
                $email = htmlspecialchars($_POST['email']);
                $email2 = htmlspecialchars($_POST['email2']);
                $error = [];

                if (empty($login)) {
                    $error[] = 'Please write down your login';
                }
                if ($password != $password2) {
                    $error[] = 'Your two passwords do not match';
                }
                if (empty($email)) {
                    $error[] = 'Please write down your email';
                }
                if (empty($email2)) {
                    $error[] = 'Please confirm your password';
                }
                if ($email != $email2) {
                    $error[] = 'Your two emails do not match';
                }
                if (!empty($error)) {
                    throw new Exception(implode('', $error));
                }

                $stmt = $this->db->prepare("SELECT * FROM utilisateurs WHERE id = :id");
                $stmt->bindValue(':id', $id);
                $stmt->execute();

                if ($stmt->rowCount() == 1) {
                    if (empty($_POST['password']) && empty($_POST['password2'])) {
                        $query = $this->db->prepare("UPDATE utilisateurs SET login = :login, email = :email, id_droits = :id_droits WHERE id= :id");
                        $query->bindValue(':login', $login);
                        $query->bindValue(':email', $email);
                        $query->bindValue(':id_droits', $droit);
                        $query->bindValue(':id', $id);
                        $query->execute();
                    } else {
                        $query = $this->db->prepare("UPDATE utilisateurs SET login = :login, password = :password, email = :email, id_droits = :id_droits WHERE id= :id");
                        $query->bindValue(':login', $login);
                        $query->bindValue(':password', $password);
                        $query->bindValue(':email', $email);
                        $query->bindValue(':id_droits', $droit);
                        $query->bindValue(':id', $id);
                        $query->execute();
                    }
                }
            }
        }
    }

    public function getUserById($id)
    {
        $query = $this->db->prepare("SELECT * FROM utilisateurs WHERE id = :id");
        $query->execute([':id' => $id]);
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }
}
