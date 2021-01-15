<?php

namespace App\Controller;

use App\Model\ArticlesModel;

//use App\Database;

class IndexController extends Controller
{
    protected $articles;

    public function __construct()
    {
        $this->articles = $this->loadArticles(3);
    }

    public function loadArticles($number = 5)
    {
        $articlesModel = new ArticlesModel;
        $articles = $articlesModel->getLast($number);
        return $articles;
    }

    /**
     * Same method as render in Controller, only loadArticles() in var $articles in addition
     */
    public function render()
    {
        $viewName = $this->getViewName();
        $viewPath = $this->viewPath;

        $articles = $this->articles;

        ob_start();
        require $viewPath . '/' . $viewName . '.php';
        $content = ob_get_clean();
        require $viewPath . '/template/template.php';
    }
}
