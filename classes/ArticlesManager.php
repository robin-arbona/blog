<?php

class ArticlesManager extends Manager
{
    public function getByXWithOffset(int $offset, int $X = 5)
    {
        $SQL = "SELECT * FROM {$this->tableName} ORDER BY id ASC LIMIT " . (int) $X . " OFFSET " . ((int) $offset);
        $sth = $this->db->query($SQL);
        $sth->setFetchMode(PDO::FETCH_CLASS, $this->entityName);

        return $sth->fetchAll();
    }
}
