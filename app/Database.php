<?php

namespace App;

use PDO;
use PDOException;

class Database
{
    protected $db;
    protected $host = 'localhost';
    protected $dbname = 'blog';
    protected $username = 'root';
    protected $password = '';

    public function __construct()
    {
        $db = $this->getDb();
        return $db;
    }

    /**
     * Get $db link with PDO (create a NEW PDO instance if needed)
     */
    public function getDb()
    {
        if ($this->db === NULL) {
            try {
                $db = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        } else {
            $db = $this->db;
        }
        return $db;
    }
}
