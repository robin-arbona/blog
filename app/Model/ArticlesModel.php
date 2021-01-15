<?php

namespace App\Model;

use PDO;
use App\Database;

class ArticlesModel
{
    public function getLast()
    {
        $SQL = 'SELECT * FROM articles ORDER BY id DESC LIMIT 1;';
        $sth = Database::getDb()->query($SQL);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'ArticleEntity');
        return $sth->fetch();
    }
}
