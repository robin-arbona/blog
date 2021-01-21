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
        $user = 'root';
        $pass = '';
        $serveur = "mysql:host=$host;dbname=$dbname";

        $pdo = new PDO($serveur, $user, $pass);
        $this->link = $pdo;
    }


    /**
     * Renvois liste de tout les catégories
     * @return string
     */

    public function findAll($actual = NULL)
    {
        $SQL = ("SELECT * FROM categories");
        $data = $this->link->query($SQL)->fetchAll(PDO::FETCH_ASSOC);
        $option = NULL;
        foreach ($data as $value) {
            $selected = $actual == $value['id'] ? 'selected' : '';
            $option .= "<option $selected >" . $value['nom'] . "</option>";
        }
        return $option;
    }

    /**
     * Retourne l'id d'une categorie donnée en parametre
     * @return string 
     */

    public function findId($article)
    {
        $query = $this->link->prepare("SELECT id FROM categories WHERE nom = :nom");
        $query->execute(['nom' => $article]);
        $data = $query->fetch();
        return $data['id'];
    }
}
