<?php

namespace App\Controller;

/**
 * Controller parent classes
 */
class Controller
{
    protected $viewPath = 'view';

    public function __construct()
    {
        $this->render();
    }

    /**
     * Generic method which load view in variable $content and require after view/template/template.php
     * @param data Specific data passed to view to display content
     * @param viewname is used when viewname couldn't be found automatically with controller name
     */
    public function render($data = null, $viewName = NULL)
    {
        $viewPath = $this->viewPath;
        $content = $this->loadContent($data, $viewName);
        require $viewPath . '/template/template.php';
    }

    /**
     * Load content from the view wich have the same name that the controller and return it variable
     * @param data Specific data passed to view to display content
     * @param viewname Has to be specified if != than the controller name
     */
    public function loadContent($data = null, $viewName = NULL)
    {
        $viewPath = $this->viewPath;
        if ($viewName === NULL) {
            $viewName = $this->getViewName();
        }
        ob_start();
        require $viewPath . '/' . $viewName . '.php';
        $content = ob_get_clean();
        return $content;
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
}
