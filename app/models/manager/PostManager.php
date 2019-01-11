<?php
namespace App\Models\manager;
use App\Models\Database;
use App\Models\Post;

class PostManager extends Database
{
    // Retourne le contenu d'un billet
    public function getOne(int $chapterId)
    {
        $req = 'SELECT id, title, content, DATE_FORMAT(date, \'%d/%m/%Y\') AS date
        FROM chapter
        WHERE id = ?
        ';
        $post = $this->show($req, [$chapterId]);
        return new Post($post) ;
    }
}
