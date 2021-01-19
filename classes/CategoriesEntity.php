<?php

class CategoriesEntity
{
    public function getLink()
    {
        $URI = $this->getURI();
        if (($pos = strpos($URI, 'categorie=')) !== FALSE) {
            $URI[$pos + strlen('categorie=')] = $this->id;
            $link = $URI;
        } else {
            if ($URI[-1] == 'p') {
                $joinner = '?';
            } else {
                $joinner = '&';
            }
            $link = $URI . $joinner . 'categorie=' . $this->id;
        }
        return $link;
    }


    public function getURI()
    {
        $URI = explode('/', $_SERVER['REQUEST_URI']);
        return end($URI);
    }
}
