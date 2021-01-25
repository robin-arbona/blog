<?php

namespace core;

use \PDO;

/**
 * Class manager is used to extends each manager:
 * -One manager match to one table in db and spelling 
 * has to be identic to use general method or tablename has to be specified
 * -Link to PDO in construct process is expeced
 * -Entity class matching to manager has to be created
 * ex: (table in db) --> users, (class manager) --> UsersManager, (class entity) --> UsersEntity
 */
abstract class Manager
{
    protected $db;
    protected $tableName;
    protected $EntityClassName;


    /**
     * link to with db using PDO is expected
     */
    public function __construct($db)
    {
        $this->db = $db;

        $this->tableName = $this->getTableName();
        $this->EntityClassName = $this->getEntityClassName();
    }

    /** 
     * Get the last X entry in table, en array of object is returned.
     */
    public function getLast($number = 1)
    {
        $SQL = "SELECT * FROM {$this->tableName} ORDER BY id DESC LIMIT " . (int) $number;
        $sth = $this->db->query($SQL);
        $sth->setFetchMode(PDO::FETCH_CLASS, $this->EntityClassName);

        return $sth->fetchAll();
    }

    /**
     * Get All the entry, an array of object is returned.
     */
    public function getAll()
    {
        $SQL = "SELECT * FROM {$this->tableName};";
        $sth = $this->db->query($SQL);

        $sth->setFetchMode(PDO::FETCH_CLASS, $this->EntityClassName);

        return $sth->fetchAll();
    }


    /**
     * Get one entry matching to the $id
     */
    public function getById($id)
    {
        $SQL = "SELECT * FROM {$this->tableName} WHERE id = " . (int) $id;
        $sth = $this->db->query($SQL);
        $sth->setFetchMode(PDO::FETCH_CLASS, $this->EntityClassName);

        return $sth->fetch();
    }

    /**
     * Return table name, based on naming convention
     */
    public function getTableName()
    {
        $tableName = strtolower(str_replace('Manager', '', get_class($this)));
        $tableName = explode('\\', $tableName);
        $tableName = end($tableName);
        return $tableName;
    }

    /**
     * Return entity name classes, based on naming convention
     */
    public function getEntityClassName()
    {
        return 'App\Entity\\' . ucfirst($this->tableName) . 'Entity';
    }

    /**
     * Return the date
     */
    public function date(): string
    {
        return date("Y-m-d H:i:s");
    }

    /**
     * Delete on entry
     */
    public function delete($id)
    {
        $SQL = "DELETE FROM {$this->tableName} WHERE id = " . (int) $id;
        $this->db->query($SQL);
    }

    /**
     * Return the matching id of the last entry in db
     */
    public function getLastId()
    {
        return $this->db->lastInsertId();
    }
}
