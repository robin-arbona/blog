<?php


namespace App\Controller;


class ArticlesController extends Controller
{
    use loadArticles;

    public function __construct()
    {
        $data['articles'] = $this->loadArticles(5);
        $this->render($data);
    }
}
