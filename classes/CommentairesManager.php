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
                ORDER BY commentaires.id ASC;";
        $sth = $this->db->query($SQL);
        $sth->setFetchMode(PDO::FETCH_CLASS, $this->entityName);

        return $sth->fetchAll();
    }
}
