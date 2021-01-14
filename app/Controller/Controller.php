<?php

namespace App\Controller;

class Controller
{
    public function render()
    {
        echo get_class();
        require 'view/template/template.php';
    }
}
