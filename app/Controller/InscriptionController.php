<?php


namespace App\Controller;


use App\Database;

class InscriptionController extends Controller
{
    public function new_user($password,$login)
    {
        $db = Database::getDb();
        $stmt=$db->prepare("INSERT INTO utilisateurs(login, password) VALUES (?,?)");
        $stmt->bindValue(1,$login);
        $stmt->bindvalue(2,$password);
        $stmt->execute();
    }
    public function sign_up()
    {
        if (isset($_POST['sign-up'])) {
            if (!empty($_POST['login'])) {

            } else {
                $error = 'Please write down your login';
            }
            if (!empty($_POST['password'])) {

            } else {
                $error = 'Please write down your password';
            }
            if (!empty($_POST['password2'])) {

            } else {
                $error = 'Please confirm your password';
            }
            if (!empty($_POST['email'])) {

            } else {
                $error = 'Please write down your email';
            }
            if (!empty($_POST['email2'])) {

            } else {
                $error = 'Please confirm your email';
            }
            $this->new_user($_POST['password'],$_POST['login']);
        }
    }
}