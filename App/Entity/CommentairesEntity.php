<?php

namespace App\Entity;

class CommentairesEntity
{
    public function getLinkEdit()
    {
        return "<a class='btn btn-warning' href='article.php?id={$this->id_article}&cmt_id={$this->id}&action=edit'>Edit</a> ";
    }

    public function getLinkDelete()
    {
        return "<a class='btn btn-danger' href='article.php?id={$this->id_article}&cmt_id={$this->id}&action=delete'>Delete</a>";
    }
}
