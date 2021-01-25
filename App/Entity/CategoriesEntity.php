<?php

namespace App\Entity;

class CategoriesEntity
{
    public function getLink()
    {
        return 'articles.php?categorie=' . $this->id;
    }
}
