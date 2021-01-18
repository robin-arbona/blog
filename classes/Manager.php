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
        $this->tableName = $this->getManagerName();
        $this->entityName = $this->getEntityName();
    }

    public function getLast($number = 1)
    {
        $SQL = "SELECT * FROM {$this->tableName} ORDER BY id DESC LIMIT " . (int) $number;
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

    public function getManagerName()
    {
        return strtolower(str_replace('Manager', '', get_class($this)));
    }

    public function getEntityName()
    {
        return ucfirst($this->tableName) . 'Entity';
    }
}
