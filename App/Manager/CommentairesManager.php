<?php

namespace App\Manager;

use core\Manager;
use \PDO;

class CommentairesManager extends Manager
{
    public function getAllByArticleId(int $id_article)
    {
        $SQL = "SELECT commentaires.commentaire, 
                        commentaires.date,
                        utilisateurs.login,
                        commentaires.id,
                        commentaires.id_article 
                FROM {$this->tableName} 
                JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id
                WHERE id_article = $id_article 
                ORDER BY commentaires.id DESC;";
        $sth = $this->db->query($SQL);
        $sth->setFetchMode(PDO::FETCH_CLASS, $this->EntityClassName);

        return $sth->fetchAll();
    }

    /**
     * Ajoute un commentaire en bdd
     */
    public function add(string $commentaire, int $id_article, int $id_utilisateur): void
    {
        $commentaire = htmlspecialchars($commentaire);
        $SQL = $this->db->prepare("INSERT INTO commentaires(commentaire, id_article, id_utilisateur, date) VALUE(?, ?, ?, ?)");
        $SQL->execute([$commentaire, $id_article, $id_utilisateur, $this->date()]);
    }

    public function update($id, $commentaire)
    {
        $commentaire = htmlspecialchars($commentaire);
        $SQL = $this->db->prepare("UPDATE `commentaires` SET `commentaire`=:commentaire WHERE `id`=:id");
        $SQL->execute([
            ':commentaire' => $commentaire,
            ':id' => $id
        ]);
    }
}
