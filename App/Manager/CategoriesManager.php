<?php

namespace App\Manager;

use core\Manager;
use \PDO;

class CategoriesManager extends Manager
{
    /**
     * Renvois liste de tout les catégories
     * @return string
     */

    public function findAll($actual = NULL)
    {
        $SQL = ("SELECT * FROM categories");
        $data = $this->db->query($SQL)->fetchAll(PDO::FETCH_ASSOC);
        $option = NULL;
        foreach ($data as $value) {
            $selected = $actual == $value['id'] ? 'selected' : '';
            $option .= "<option $selected >" . $value['nom'] . "</option>";
        }
        return $option;
    }

    /**
     * Retourne une categorie selectionner dans un tableau
     * @return string
     */

    public function findSelected(array $tab): string
    {
        foreach ($tab as $key => $value) {
            $categorie = $value['categorie'];
        }
        return $categorie;
    }

    /**
     * Retourne l'id d'une categorie donnée en parametre
     *@return string
     */

    public function findId($article): string
    {
        $query = $this->db->prepare("SELECT id FROM categories WHERE nom = :nom");
        $query->execute(['nom' => $article]);
        $data = $query->fetch();
        return $data['id'];
    }

    /**
     * Modifie le nom d'un categorie selectionné
     * @return void
     */

    public function edit(string $categorie, string $newCategorie): void
    {
        $SQL = $this->db->prepare("UPDATE categories SET nom = ? WHERE nom = ?");
        $SQL->execute([$newCategorie, $categorie]);
    }

    /**
     * Delete une categorie selectionné
     * @return void
     */

    public function delete($categorie)
    {
        $SQL = ("DELETE FROM categories WHERE nom = :nom ");
        $stmt = $this->db->prepare($SQL);
        $stmt->bindValue(':nom', $categorie);
        $stmt->execute();
    }

    /**
     * Ajout d'une categorie dans base de donnée
     * @return void
     */
    public function add(string $categorie): void
    {
        $SQL = $this->db->prepare("INSERT INTO categories(nom) VALUE(?)");
        $SQL->execute([$categorie]);
    }
}
