<?php

namespace App\Controller;

use App\Model\ArticlesModel;

/**
 * This trait is used by differents controller to load articles object in an array
 * @param number of article loaded
 * @return articles array of articles object
 */
trait LoadArticles
{
    public function loadArticles($number = 5, $offset = 0)
    {
        $articlesModel = new ArticlesModel;
        $articles = $articlesModel->getLast($number);
        return $articles;
    }
}
