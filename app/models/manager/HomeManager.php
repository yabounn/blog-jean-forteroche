<?php
namespace App\Models\manager;
use App\Models\Database;
use App\Models\Post;

class HomeManager extends Database
{
    public function homePost()
    {
        $posts = [];
        $req = 'SELECT id, title, content, DATE_FORMAT (date, \'%d/%m/%Y \') AS date
                FROM chapter
                ORDER BY id
                DESC 
                LIMIT 0, 1';
        $result = $this->runReq($req, $posts);

        foreach($result as $post)
        {
            $posts[] = new Post($post);
        }
        return $posts;
    }
}
