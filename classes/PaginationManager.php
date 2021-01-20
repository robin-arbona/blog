<?php

class PaginationManager extends Manager
{
    protected $articleNb;
    protected $totalPageNb;
    protected $pageActive;
    protected $back_btn_active;
    protected $next_btn_active;

    public function __construct(int $offset, int $limit = 5, $categorie = NULL)
    {
        parent::__construct();
        $this->offset = $offset;
        $this->limit = $limit;
        $this->categorie = $categorie;
        $this->loadParameters();
    }

    public function loadParameters()
    {
        $SQL = 'SELECT COUNT(id) FROM articles ';
        $SQL .=  $this->categorie !== NULL ? "WHERE id_categorie = {$this->categorie};" : ';';
        $this->articlesNb = $this->db->query($SQL)->fetchColumn();
        $this->totalPageNb = ceil($this->articlesNb / $this->limit);
        $this->pageActive = ($this->offset / $this->limit + 1);
        $this->back_btn_active = $this->pageActive == 1 ? FALSE : TRUE;
        $this->next_btn_active = $this->pageActive == $this->totalPageNb ? FALSE : TRUE;
    }

    public function getLink($page)
    {
        $start = $page * 5 - 5;
        $URI = 'articles.php?start=' . $start;
        $URI .= $this->categorie == NULL ? '' : "&categorie={$this->categorie}";
        return $URI;
    }

    public function __get($key)
    {
        if (isset($this->$key)) {
            return $this->$key;
        } else {
            return NULL;
        }
    }
}
