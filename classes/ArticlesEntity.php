<?php


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

    public function getLink()
    {
        return 'article.php?id=' . $this->id;
    }

    public function getImgPth()
    {
        return '../public/image/article_mainpic_' . $this->id . '.jpg';
    }
}
