<?php

namespace App\Entity;

class ArticlesEntity
{
    /**
     * Return an extract of the first 25 words of article content
     * @return string 25 first words of article ended by ...
     */
    public function getExtract()
    {
        $article = $this->article;
        if ($article == NULL) {
            return 'No extract';
        }
        $extract = '';
        $articleTab = explode(' ', $article);
        for ($i = 0; $i < 25; $i++) {
            if (!isset($articleTab[$i])) {
                break;
            }
            $extract .= $articleTab[$i] . ' ';
        }
        $extract .= ' ...';
        return strip_tags($extract);
    }

    /**
     * Return html path to the article
     * @return string format: article.php?id=$id
     */
    public function getLinkView()
    {
        return 'article.php?id=' . $this->id;
    }

    /**
     * Return a <a href></a> tag, formated with bootstrap classes, link with GET method to delete one article
     * @return string fromat: <a class='btn btn-danger col-1 m-1' href='articles.php?id=$id&action=delete'>Delete</a>
     */
    public function getBtnDelete()
    {
        return "<a class='btn btn-danger col-1 m-1' href='articles.php?id={$this->id}&action=delete'>Delete</a>";
    }


    /**
     * Return a <a href></a> tag, formated with bootstrap classes, link with GET method to edit one article
     * @return string fromat: <a class='btn btn-warning col-1 m-1' href='creer-article.php?id=$id&action=edit'>Edit</a>
     */
    public function getBtnEdit()
    {
        return "<a class='btn btn-warning col-1 m-1' href='creer-article.php?id={$this->id}&action=edit'>Edit</a>";
    }

    /**
     * Return a relativ filepath for a .jpg based on the article $id, 
     * @return string fromat: '../public/image/article_mainpic_$id.jpg
     */
    public function getImgPth()
    {
        return '../public/image/article_mainpic_' . $this->id . '.jpg';
    }
}
