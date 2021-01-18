<?php
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
        if (isset($_POST['sign-in'])) {
            if (!empty($_POST['login'])) {

            } else {
                $error = 'Please write down your login';
            }
            if (!empty($_POST['password'])) {

            } else {
                $error = 'Please write down your password';
            }
        }
    }

    public function connect_user()
    {
        $db = Database::getDb();
        $stmt = $db->prepare("SELECT * FROM utilisateurs WHERE login = :login");
        $stmt->bindValue(':login', $_POST['login']);
        $stmt->execute();
        $tab = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) {
            if (password_verify($_POST['password'], $tab['password'])) {
                session_start();
                $_SESSION['login'] = $tab['login'];
                $_SESSION['id'] = $tab['id'];
                $_SESSION['password'] = $tab['password'];
                $_SESSION['email'] = $tab['email'];
                echo 'you are connected !!';
            }
        }
    }
}
