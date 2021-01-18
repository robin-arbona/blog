<?php

class Article
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

    public function checklink()
    {
        try
        {
            $this->link;
            echo 'Connexion établie petit peruche';
        }
        catch(PDOExecption $e)
        {
            echo 'ERREUR : '.$e->getMessage();
        }
    }

    public function createArticle(string $title, string $article, int $id_utilisateur, int $id_categorie, string $date) :void
    {
   
       $SQL = ("INSERT INTO articles(title,article,id_utilisateur,id_categorie,date) VALUE(? , ?, ?, ?, ?)");
       $this->link->prepare($SQL)->execute([$title,$article,$id_utilisateur,$id_categorie,$date]);
       
    }

    public function addComment(string $commentaire, int $id_article, int $id_utilisateur, string $date) :void
    {
   
       $SQL = ("INSERT INTO commentaires(commentaire, id_article, id_utilisateur, date) VALUE(?, ?, ?, ?)");
       $this->link->prepare($SQL)->execute([$commentaire, $id_article, $id_utilisateur, $date]);
       
    }

    

}


?>