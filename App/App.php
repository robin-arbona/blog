<?php

namespace App;

use core\PDOHandeler;

class App
{
    protected $confpath = 'conf/conf.php';
    protected $conf;
    protected $db;

    public function __construct()
    {
        spl_autoload_register([$this, 'autoload']);
        $this->loadConfiguration();
        $this->getDb();
    }

    public function autoload($classNameAndNamespace)
    {
        $classFile = str_replace('\\', '/', $classNameAndNamespace) . '.php';
        require $classFile;
    }

    public function loadConfiguration()
    {
        require $this->confpath;
        $this->conf = $conf;
    }

    public function getDb()
    {
        if ($this->db === NULL) {
            $this->db = new PDOHandeler($this->conf);
        }
        return $this->db;
    }
}
