<?php

class ArticlesManager extends Manager
{
    public function getArticlesList(int $offset, int $limit = 5, $categorie = NULL)
    {
        $SQL = "SELECT articles.id, articles.title, articles.article, categories.nom AS categorie, articles.date, utilisateurs.login AS author
                 FROM articles
                 JOIN categories ON articles.id_categorie = categories.id
                 JOIN utilisateurs ON articles.id_utilisateur = utilisateurs.id ";

        if ($categorie !== NULL) {
            $SQL .= ' WHERE categories.id = :categorie;';
        }

        $SQL .= "ORDER BY id ASC LIMIT :limit 
                 OFFSET :offset";

        $sth = $this->db->prepare($SQL);

        $sth->bindValue(':limit', $limit, PDO::PARAM_INT);
        $sth->bindValue(':offset', $offset, PDO::PARAM_INT);

        $sth->setFetchMode(PDO::FETCH_CLASS, $this->entityName);
        if ($categorie !== NULL) {
            $sth->bindValue(':categorie', $categorie, PDO::PARAM_INT);
        }

        var_dump($sth);
        $sth->execute();

        return $sth->fetchAll();
    }
}
