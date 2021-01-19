<?php

class Inscription
{
public function __construct(){

    $this->login = $_POST['login'];
    $this->password = $_POST['password'];
    $this->password2 = $_POST['password2'];
    $this->email = $_POST['email'];
    $this->email2 = $_POST['email2'];
}
    public function insert_user(){
        $dsn = 'mysql:dbname=blog;host=localhost';
        $user = 'root';
        $pass = '';
        $db = new PDO($dsn,$user,$pass);
        $stmt=$db->prepare("INSERT INTO utilisateurs(login, password, email, id_droits) VALUES (:login,:password,:email,:id_droits)");
        $stmt->bindValue(':login',$this->login);
        $stmt->bindvalue(':password', $this->password);
        $stmt->bindValue(':email',$this->email);
        $stmt->bindValue(':id_droits',1);
        $stmt->execute();
    }
    public function new_user()
    {

        if (isset($_POST['sign-up'])) {

            if (!empty($this->login)){

            } else {
                $error = 'Please write down your login';
            }
            if (!empty($this->password)) {

            } else {
                $error = 'Please write down your password';
            }
            if (!empty($this->password2)) {

            } else {
                $error = 'Please confirm your password';
            }
            if (!empty($this->email)) {

            } else {
                $error = 'Please write down your email';
            }
            if (!empty($this->email2)) {

            } else {
                $error = 'Please confirm your email';
            }

            if($this->password == $this->password2 && $this->email == $this->email2){
                $this->insert_user();
            }
        }
    }
}
