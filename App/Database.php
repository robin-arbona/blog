<?php

namespace App;

use PDO;
use PDOException;

class Database
{
    static protected $_db;
    static protected $host = 'localhost';
    static protected $dbname = 'blog';
    static protected $username = 'phpmyadmin';
    static protected $password = 'lecam';


    /**
     * Get $db link with PDO (create a NEW PDO instance if needed)
     * @return PDO pdo link;
     */
    public static function getDb()
    {
        if (SELF::$_db === NULL) {
            $host = SELF::$host;
            $dbname = SELF::$dbname;
            $username = SELF::$username;
            $password = SELF::$password;
            try {
                $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        } else {
            $db = SELF::$_db;
        }
        return $db;
    }
}
