<?php


namespace App\Controller;

use App\Model\ArticlesModel;

class ArticleController extends Controller
{
    public function __construct($id)
    {
        $data['article'] = $this->loadArticle($id);
        $data['comments'] = $this->loadComments($id);
        $this->render($data);
    }

    /** 
     * Load and returns comments matching to the article id provided
     * @param int $id_article
     * @return array $comments 
     * */
    public function loadComments(int $id_article)
    {
        return [];
    }

    /** 
     * Loads and returns article matching to  id provided
     * @param int $id_article
     * @return \App\Controller\ArticlesEntity
     * */
    public function loadArticle(int $id_article)
    {
        $articlesModel = new ArticlesModel;
        $article = $articlesModel->getById($id_article);
        return $article;
    }
}
