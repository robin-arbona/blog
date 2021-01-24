<?php

class Test extends Manager
{
    public function allUser() //similaire à categorie manager
    {
        $SQL = ("SELECT login FROM utilisateurs");
        $data = $this->db->query($SQL)->fetchAll(PDO::FETCH_ASSOC);
        $option = NULL;
        foreach ($data as $value) 
        {

            $option .= "<option>" . $value['login'] . "</option>";
        }
        return $option;
    }

    //findselected utilisé dans 2 model different  à voir pour mettre dans manager ...

    public function edituser($login)
    {
        $query = $this->db->prepare("SELECT id,login, email FROM utilisateurs WHERE login = ?"); // comment faire si plusieur login identique ?
        $query->execute([$login]);
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $key => $value) 
        {
            session_start();
            $_SESSION['id'] = $value['id'];
            $_SESSION['login'] = $value['login'];
            $_SESSION['email'] = $value['email'];

            
            
            //echo $_SESSION['edit_email'];
        }
        return $_SESSION;
        


    }
}

?>