<?php

class CommentairesManager extends Manager
{
    public function getAllByArticleId(int $id_article)
    {
        $SQL = "SELECT commentaires.commentaire AS content, 
                        commentaires.date,
                        utilisateurs.login AS author 
                FROM {$this->tableName} 
                JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id
                WHERE id_article = $id_article 
                ORDER BY commentaires.id DESC;";
        $sth = $this->db->query($SQL);
        $sth->setFetchMode(PDO::FETCH_CLASS, $this->entityName);

        return $sth->fetchAll();
    }

    /**
     * Ajoute un commentaire en bdd
     */
    public function add(string $commentaire, int $id_article, int $id_utilisateur): void
    {
        $SQL = $this->db->prepare("INSERT INTO commentaires(commentaire, id_article, id_utilisateur, date) VALUE(?, ?, ?, ?)");
        $SQL->execute([$commentaire, $id_article, $id_utilisateur, $this->date()]);
    }
}
