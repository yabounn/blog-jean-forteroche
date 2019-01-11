<?php
namespace App\Models\manager;

use App\Models\Database;
use App\Models\Post;

class PostsManager extends Database
{
    // Retourne l'ensemble des chapitres
    public function getAll()
    {
        $chapters = [];
        $req = 'SELECT id, title, content, DATE_FORMAT (date, \'%d/%m/%Y\') AS date
                FROM chapter
                ORDER BY id
                DESC';

        $result = $this->runReq($req, $chapters);

        foreach($result as $chapter)
        {
            $chapters[] = new Post($chapter);
        }
        return $chapters;
    }
}
