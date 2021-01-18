<?php


namespace App\Controller;


class ArticlesController extends Controller
{
    use LoadArticles;

    public function __construct()
    {
        $data['articles'] = $this->loadArticles(5);
        $this->render($data);
    }
}
