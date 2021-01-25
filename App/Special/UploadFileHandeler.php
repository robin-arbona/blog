<?php

namespace App\Special;

/**
 * Save picture uploaded from cree-article.php in /public/image/article_mainpic_$id.jpg
 * when a file has been uploaded and a $id provided in constructor
 */
class UploadFileHandeler
{
    protected $fileName = 'article_mainpic';

    public function __construct(int $id_article)
    {
        if (!$this->isFileUploaded()) {
            return;
        }
        $filePath = $this->getFilePath($id_article);
        $this->save($filePath);
    }

    public function isFileUploaded()
    {
        if (strlen($_FILES["{$this->fileName}"]["tmp_name"]) !== 0) {
            return TRUE;
        }
        return FALSE;
    }

    public function getFilePath($id_article)
    {
        $filePath = realpath(ROOT_PATH) . "/public/image/{$this->fileName}_$id_article.jpg";
        return $filePath;
    }

    public function save($filePath)
    {
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        move_uploaded_file($_FILES["{$this->fileName}"]["tmp_name"], $filePath);
    }
}
