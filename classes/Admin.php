<?php

class Admin
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

    


    public function showCategorie()
    {
        $SQL = ("SELECT * FROM categories");
        $data = $this->link->query($SQL)->fetchAll(PDO::FETCH_ASSOC);
        $option = NULL;
        foreach($data as $cate)
        {
            
            $option .= "<label for='$cate[id]'><input name='$cate[id]' id='$cate[id]' type='text' class='form-control' autocomplete='off' value='$cate[nom]'></label>";
        }
        return $option;
    }



    
}

?>