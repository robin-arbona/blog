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

    /**
     * Retourne la date
     * @return string
     */

    public function date() :string
    {
        return date("Y-m-d H:i:s");
    }

    /**
     * Ajoute un article en bdd
     */

    public function createArticle(string $title, string $article, int $id_utilisateur, int $id_categorie) :void
    {
        $SQL = $this->link->prepare("INSERT INTO articles(title,article,id_utilisateur,id_categorie,date) VALUE(? , ?, ?, ?, ?)");
        $SQL->execute([$title,$article,$id_utilisateur,$id_categorie,$this->date()]);
        
    }

    /**
     * Ajoute un commentaire en bdd
     */

    public function addComment(string $commentaire, int $id_article, int $id_utilisateur) :void
    {
   
       $SQL = $this->link->prepare("INSERT INTO commentaires(commentaire, id_article, id_utilisateur, date) VALUE(?, ?, ?, ?)");
       $SQL->execute([$commentaire, $id_article, $id_utilisateur, $this->date()]);
       
    }

    

}


?>