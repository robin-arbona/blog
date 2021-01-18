<?php

namespace App\Controller;


class IndexController extends Controller
{
    use loadArticles;

    protected $articles;

    public function __construct()
    {
        $data['articles'] = $this->loadArticles(3);
        $this->render($data);
    }
}
