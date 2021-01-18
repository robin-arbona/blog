<?php

namespace App\Model;

use PDO;
use App\Database;

class Model
{
    /**
     * Get last $number entry of Table wich have the same name as Model
     */
    public function getLast($number = 1)
    {
        $modelName = $this->getModelName();
        $className = 'App\Entity\\' . ucfirst($modelName) . 'Entity';

        $SQL = "SELECT * FROM $modelName ORDER BY id DESC LIMIT " . $number;
        $sth = Database::getDb()->query($SQL);
        $sth->setFetchMode(PDO::FETCH_CLASS, $className);
        return $sth->fetchAll();
    }

    /**
     * Get one entry by id
     * @param int $id 
     * @return void Matching entity object
     */
    public function getById($id)
    {
        $modelName = $this->getModelName();
        $className = 'App\Entity\\' . ucfirst($modelName) . 'Entity';

        $SQL = "SELECT * FROM $modelName WHERE id = " . $id;
        $sth = Database::getDb()->query($SQL);
        $sth->setFetchMode(PDO::FETCH_CLASS, $className);
        return $sth->fetch();
    }



    /**
     * return Model Name based on class model name
     */
    public function getModelName()
    {
        $parts = explode('\\', get_class($this));
        $controllerName = end($parts);
        return strtolower(str_replace('Model', '', $controllerName));
    }
}
