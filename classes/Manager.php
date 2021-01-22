<?php

class Manager
{
    protected $db;
    protected $host = 'localhost';
    protected $dbname = 'blog';
    protected $login = 'root';
    protected $password = '';
    protected $tableName;
    protected $entityName;

    public function __construct()
    {
        $this->db = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->login, $this->password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->exec('SET NAMES utf8');
        $this->tableName = $this->getTableName();
        $this->entityName = $this->getEntityName();
    }

    public function getLast($number = 1)
    {
        $SQL = "SELECT * FROM {$this->tableName} ORDER BY id DESC LIMIT " . (int) $number;
        $sth = $this->db->query($SQL);
        $sth->setFetchMode(PDO::FETCH_CLASS, $this->entityName);

        return $sth->fetchAll();
    }

    public function getAll()
    {
        $SQL = "SELECT * FROM {$this->tableName};";
        $sth = $this->db->query($SQL);
        $sth->setFetchMode(PDO::FETCH_CLASS, $this->entityName);

        return $sth->fetchAll();
    }


    public function getById($id)
    {
        $SQL = "SELECT * FROM {$this->tableName} WHERE id = " . (int) $id;
        $sth = $this->db->query($SQL);
        $sth->setFetchMode(PDO::FETCH_CLASS, $this->entityName);

        return $sth->fetch();
    }

    public function getTableName()
    {
        return strtolower(str_replace('Manager', '', get_class($this)));
    }

    public function getEntityName()
    {
        return ucfirst($this->tableName) . 'Entity';
    }

    public function date(): string
    {
        return date("Y-m-d H:i:s");
    }

    public function delete($id)
    {
        $SQL = "DELETE FROM {$this->tableName} WHERE id = " . (int) $id;
        $this->db->query($SQL);
    }

    public function getLastId()
    {
        return $this->db->lastInsertId();
    }
}
