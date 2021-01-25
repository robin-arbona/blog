<?php

namespace App\Manager;

use \PDO;

class Admin extends CategoriesManager
{
    /**
     * Retourne la liste des utilisateurs en base de donnée
     * @return string
     */
    public function allUser(): string //similaire à findAll (categorie manager) voir pour la rendre + générique 
    {
        $SQL = ("SELECT login FROM utilisateurs");
        $data = $this->db->query($SQL)->fetchAll(PDO::FETCH_ASSOC);
        $option = NULL;
        foreach ($data as $value) {

            $option .= "<option>" . $value['login'] . "</option>";
        }
        return $option;
    }

    /**
     * Recupére les données de l'ulisateur selectionné et modifie les $_SESSION
     * pour fonctionner avec modify_user (ModifyProfilManager)
     * une fois redirigé vers profil
     * @return array
     */

    public function edituser(string $user): array
    {
        $query = $this->db->prepare("SELECT id,login, email FROM utilisateurs WHERE login = ?");
        /**
         * Comment faire si plusieur login identique ?
         * Esque ca change les droit de admin ?
         */
        $query->execute([$user]);
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data;
    }



    /**
     * Traite les formulaires de la page admin
     * @return void 
     */

    public function form(): void
    {
        if (isset($_POST['edit'])) {

            $tab[] = $_POST;

            $categorie = $this->findselected($tab);

            $edited = $_POST['edite_categorie'];

            $this->edit($categorie, $edited);
        } elseif (isset($_POST['delete'])) {
            $tab[] = $_POST;
            $categorie = $this->findselected($tab);
            $this->delete($categorie);
        } elseif (isset($_POST['add'])) {
            $newCategorie = $_POST['categorie'];
            $this->add($newCategorie);
        } elseif (isset($_POST['edit_user'])) {
            $tab[] = $_POST;
            $user = $this->findselected($tab);
            $userdata = $this->edituser($user);
            if (!empty($userdata)) {
                $id_utilisateur = $userdata['id'];
                header("Location: profil.php?id_utilisateur=$id_utilisateur&action=edit");
            }
        } elseif (isset($_POST['creatuser'])) {
            header('Location:inscription.php');
        }
    }

    /**
     * Check $_SESSION['id_droits']
     * -> redirection if user not allowed
     */
    public function checkRight()
    {
        $id_droits = isset($_SESSION['id_droits']) ? $_SESSION['id_droits'] : 1;
        if ($id_droits == 1) {
            header('Location: connexion.php');
        }
        return $id_droits;
    }
}
