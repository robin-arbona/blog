<?php

namespace App;

use core\PDOHandeler;


class App
{
    protected $confpath = '/conf/conf.php';
    protected $conf;
    protected $db;

    public function __construct()
    {
        $this->defineRootPath();
        spl_autoload_register([$this, 'autoload']);
        $this->loadConfiguration();
        $this->getDb();
        session_start();
        return $this;
    }

    public function autoload($classNameAndNamespace)
    {
        $classFile = str_replace('\\', '/', $classNameAndNamespace) . '.php';
        require ROOT_PATH . '/' . $classFile;
    }

    public function loadConfiguration()
    {
        require ROOT_PATH . $this->confpath;
        $this->conf = $conf;
    }

    public function getDb()
    {
        if ($this->db === NULL) {
            $PDOhandeler = new PDOHandeler($this->conf);
            $this->db = $PDOhandeler->db;
        }
        return $this->db;
    }

    public function defineRootPath()
    {
        define('ROOT_PATH', dirname(dirname(__FILE__)));
    }
}
