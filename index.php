<?php

use App\Controller\Controller;
use App\Controller\IndexController;

// Autoloader
function autoloader($class)
{
    $path = str_replace('\\', '/', $class) . '.php';
    require $path;
}
spl_autoload_register('autoloader');


// Rooter
if (!empty($_GET) && isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page == 'index') {
        // Controler Index
        $homepage = new IndexController;
        $homepage->render();
    } elseif ($page == 'admin') {
        // Controler Admin
    }
}
