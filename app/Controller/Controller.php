<?php

namespace App\Controller;

class Controller
{
    public function render()
    {
        $parts = explode('\\', get_class($this));
        $controllerName = end($parts);
        $viewName = strtolower(str_replace('Controller', '', $controllerName));
        ob_start();
        require 'view/' . $viewName . '.php';
        $content = ob_get_clean();
        require 'view/template/template.php';
    }
}
