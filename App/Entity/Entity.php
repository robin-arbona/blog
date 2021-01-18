<?php

namespace App\Entity;

class Entity
{
    /**
     * Magical method get
     * @return void attribute when exist, else return NULL
     */
    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        } else {
            return NULL;
        }
    }
}
