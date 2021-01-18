<?php

namespace App\Controller;


class IndexController extends Controller
{
    use LoadArticles;

    protected $articles;

    public function __construct()
    {
        $data['articles'] = $this->loadArticles(3);
        $this->render($data);
    }
}
