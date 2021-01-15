<?php

namespace App\Entity;

class ArticlesEntity extends Entity
{
    public function getExtract()
    {
        $article = $this->article;
        if ($article == NULL) {
            return 'No abstract';
        }
        $abstract = '';
        $articleTab = explode(' ', $article);
        for ($i = 0; $i < 25; $i++) {
            if (!isset($articleTab[$i])) {
                break;
            }
            $abstract .= $articleTab[$i];
            $abstract .= ' ';
        }
        $abstract .= ' ...';
        return $abstract;
    }
}
