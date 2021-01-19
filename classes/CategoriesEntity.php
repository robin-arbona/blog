<?php

class CategoriesEntity
{
    public function getLink()
    {
        $URI = explode('/', $_SERVER['REQUEST_URI']);
        $URI = end($URI);
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
}
