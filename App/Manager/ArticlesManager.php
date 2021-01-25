<?php

namespace App\Manager;

use core\Manager;
use \PDO;

class ArticlesManager extends Manager
{
    public function getArticlesList(int $offset, int $limit = 5, $categorie = NULL)
    {
        $SQL = "SELECT articles.id, articles.title, articles.article, categories.nom AS categorie, articles.date, utilisateurs.login AS author
                 FROM articles
                 LEFT JOIN categories ON articles.id_categorie = categories.id
                 LEFT JOIN utilisateurs ON articles.id_utilisateur = utilisateurs.id ";

        if ($categorie !== NULL) {
            $SQL .= ' WHERE categories.id = :categorie ';
        }

        $SQL .= "ORDER BY id DESC LIMIT :limit 
                 OFFSET :offset";

        $sth = $this->db->prepare($SQL);

        $sth->bindValue(':limit', $limit, PDO::PARAM_INT);
        $sth->bindValue(':offset', $offset, PDO::PARAM_INT);

        $sth->setFetchMode(PDO::FETCH_CLASS, $this->EntityClassName);
        if ($categorie !== NULL) {
            $sth->bindValue(':categorie', $categorie, PDO::PARAM_INT);
        }

        $sth->execute();

        return $sth->fetchAll();
    }

    public function update($id_article, $titre, $article, $id_utilisateur, $id_categorie)
    {
        $SQL = 'UPDATE `articles` 
                SET `title`=:title,`article`=:article,`id_utilisateur`=:id_utilisateur,`id_categorie`=:id_categorie 
                WHERE id=:id';
        $sth = $this->db->prepare($SQL);
        $sth->execute([
            ':title' => $titre,
            'article' => $article,
            'id_utilisateur' => $id_utilisateur,
            'id_categorie' => $id_categorie,
            'id' => $id_article
        ]);
    }

    /**
     * Ajoute un article en bdd
     * @param string $title titre de l'article
     * @return void
     */

    public function createArticle(string $title, string $article, int $id_utilisateur, int $id_categorie): void
    {
        $SQL = $this->db->prepare("INSERT INTO articles(title,article,id_utilisateur,id_categorie,date) VALUE(? , ?, ?, ?, ?)");
        $SQL->execute([$title, $article, $id_utilisateur, $id_categorie, $this->date()]);
    }
}
