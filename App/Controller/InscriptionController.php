<?php


namespace App\Controller;


use App\Database;

class InscriptionController extends Controller
{
    public function new_user($password,$login,$email)
    {
        $db = Database::getDb();
        $stmt=$db->prepare("INSERT INTO utilisateurs(login, password,email) VALUES (:login,:password,:email)");
        $stmt->bindValue(login,$login);
        $stmt->bindvalue(password, $password);
        $stmt->bindValue(email,$email);
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