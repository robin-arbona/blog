<?php

namespace App\Controller;

/**
 * Controller parent classes
 */
class Controller
{
    protected $viewPath = 'view';

    /**
     * Generic method which load view in variable $content and require after view/template/template.php
     */
    public function render()
    {
        $viewName = $this->getViewName();
        $viewPath = $this->viewPath;
        ob_start();
        require $viewPath . '/' . $viewName . '.php';
        $content = ob_get_clean();
        require $viewPath . '/template/template.php';
    }

    /**
     * Return view name based on controller class name:
     * (class) IndexController --> (view) index
     * @return string view name
     */
    public function getViewName()
    {
        $parts = explode('\\', get_class($this));
        $controllerName = end($parts);
        return strtolower(str_replace('Controller', '', $controllerName));
    }

    public function createarticle_render()
    {
        $viewPath = $this->viewPath;
        ob_start();
        require $viewPath .'/creer-article.php';
        $content = ob_get_clean();
        require $viewPath .'/template/template.php';
    }

    public function create_article($article, $id_utilisateur, $id_categorie) :void
    {
        
        
    }
}
