<?php
namespace App\Models\manager;

use App\Models\Database;
use App\Models\Post;

class ChapterManager extends Database
{
     // Affiche l'ensemble des chapitres
     public function getAllChapters()
     {
         $posts = [];
        //  $req = 'SELECT chapter_id as id, title as title, content as content, DATE_FORMAT (date, \'%d/%m/%Y\') as date
        //         FROM chapters
        //         ORDER BY chapter_id
        //         DESC';

        $req = 'SELECT chapter.id AS id, title AS title, chapter.content AS content, DATE_FORMAT (chapter.date, \'%d/%m/%Y\') AS date
                FROM chapter
                INNER JOIN comment
                ON chapter.id = comment.chapter_id';

         $result = $this->runReq($req, $posts);

         foreach($result as $post)
         {
             $posts[] = new Post($post);
         }
         return $posts;
     }


     // Lire un chapitre
     public function getOneChapter($chapterId)
     {
        $req = 'SELECT id AS id, title AS title, content AS content, DATE_FORMAT(date, \'%d/%m/%Y\') AS date
                FROM chapter
                WHERE id = ?';

        $result = $this->show($req, [$chapterId]);
        return new Post($result) ;
     }


    // Ajouter un chapitre
    public function addChapter($title, $content)
    {
        $req = 'INSERT INTO chapter(title, content, date) VALUES (?, ?, NOW())';
        $result = $this->ina($req, [$title, $content]);
        return $result;
    }

    // Modifier un chapitre
    public function modifyChapter($title, $content, $chapterId)
    {
        $req = 'UPDATE chapter
                SET title = ?, content = ?, date = NOW()
                WHERE id = ?';
        $result = $this->ina($req, [$title, $content, $chapterId]);
        return $result;
    }

    // Supprimer un chapitre
    public function removeEpisode($chapterId)
    {
        $req = 'DELETE FROM chapter WHERE id = ?';
        $result = $this->ina($req, [$chapterId]);
        return $result;
    }

    /**
     * Compte la totalité des chapitres enregistrés dans la bdd
     */

    public function countChapters()
    {
        $nbChapterss='';
        $req = 'SELECT COUNT(*) AS nbChapters  FROM chapter';
        $result = $this->runReq($req);
        if(!$result){
            return $nbChapters;
        }
        foreach($result as $value){
            $nbChapters = $value['nbChapters'];
        }
        // var_dump($nbChapters);
        // exit;
        return $nbChapters;
    }

    /**
     * Permet de définir le nombre de chapitres affichés par page
     */
    public function countPages($nbChapters, $perPage)
    {
        $nbPages = ceil($nbChapters / $perPage);
        return $nbPages;
    }

}
