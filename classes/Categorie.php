<?php

class Categorie
{
    private $link;

    public function __construct()
    {
        $this->setDb();
    }
   
    public function setDb()
    {
       
        $host = 'localhost';
        $dbname = 'blog';
        $user = 'phpmyadmin';
        $pass = 'lecam';
        $serveur = "mysql:host=$host;dbname=$dbname";

        $pdo = new PDO($serveur,$user,$pass);
        $this->link = $pdo;
    }

    public function getAll() 
    {
        $SQL = ("SELECT nom FROM categories");
        $data = $this->link->query($SQL)->fetchAll(PDO::FETCH_ASSOC);
        $option = NULL;
        foreach($data as $value)
        {
            $option .= "<option>".$value['nom']."</option><br/>";
            //var_dump($value['nom']);

            
        }
        return $option;
        
        
    }

}

?>