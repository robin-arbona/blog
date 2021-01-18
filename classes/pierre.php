<?php

//Pierre



class Inscription
{

    public function insert_user(){
        $db = Database::getDb();
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



class ConnexionController
{

    public function __construct()
    {
        parent:: __construct();
        $login = $_POST['login'];
        $password = $_POST['password'];
    }

    public function connection()
    {
        if(isset($_POST['sign-in']))
        {
            if(!empty($_POST['login']))
            {

            }else{
                $error = 'Please write down your login';
            }
            if(!empty($_POST['password']))
            {

            }else{
                $error = 'Please write down your password';
            }
        }
    }
    public function connect_user()
    {
        $db = Database::getDb();
        $stmt = $db->prepare("SELECT * FROM utilisateurs WHERE login = :login");
        $stmt->bindValue(':login',$_POST['login']);
        $stmt->execute();
        $tab = $stmt->fetch(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0)
        {
            if(password_verify($_POST['password'],$tab['password']))
            {
                session_start();
                $_SESSION['login'] = $tab['login'];
                $_SESSION['id'] = $tab['id'];
                $_SESSION['password'] = $tab['password'];
                $_SESSION['email'] = $tab['email'];
                echo 'you are connected !!';
            }
        }
    }

