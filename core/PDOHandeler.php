<?php

namespace core;

use \PDO;

/**
 * Initial connection with mysql db using PDO classe
 * Associative array containing paramaters is expected
 * parameters expected :
 * -host, -login, -password, -dbname
 */
class PDOHandeler
{
    protected $host;
    protected $login;
    protected $password;
    protected $dbname;
    public $db;

    public function __construct(array $conf)
    {
        foreach ($conf as $param => $value) {
            $method = 'set' . ucfirst($param);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        $this->connect();
    }

    public function connect()
    {
        $this->db = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->login, $this->password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->exec('SET NAMES utf8');
        return $this->db;
    }

    //Setters
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    public function setHost(string $host): void
    {
        $this->host = $host;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setDbname(string $dbname): void
    {
        $this->dbname = $dbname;
    }
}
