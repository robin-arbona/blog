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


    /**
     * Renvois liste de tout les catégories
     * @return string
     */

    public function findAll() 
    {
        $SQL = ("SELECT nom FROM categories");
        $data = $this->link->query($SQL)->fetchAll(PDO::FETCH_ASSOC);
        $option = NULL;
        foreach($data as $value)
        {
            $option .= "<option>".$value['nom']."</option>";
            

            
        }
        return $option;    
    }

    /**
     * Retourne l'id d'une categorie donnée en parametre
     * 
     */

    public function findId($article) 
    {
        $query = $this->link->prepare("SELECT id FROM categories WHERE nom = :nom");
        $query->execute(['nom' => $article]);
        $data = $query->fetch();
        return $data['id'];
    }

    public function addCategorie(string $categorie) :void
    {
       $SQL = $this->link->prepare("INSERT INTO categories(nom) VALUE(?)");
       $SQL->execute([$categorie]);
       
    }


}
