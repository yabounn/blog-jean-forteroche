<?php
namespace App\Controllers;

use App\Core\SecureController;
use App\Models\manager\ChapterManager;
use App\Models\manager\CommentManager;

//SELECT * FROM `comments` ORDER BY post_id,comment_report DESC

class ChapterController extends SecureController
{
    private $chapterManager;
    private $commentManager;
   
    /** CHAPITRES */    

    // Affiche l'ensemble des chapitres /chapter/allChapters
    public function allChapters()
    {
        $this->chapterManager = new ChapterManager();
        // $allChapters = $this->adminManager->getAllChapters();

        // $this->render('allChapters', array('posts' => $allChapters));

        $nbChapters = $this->chapterManager->countChapters();
        $perPage = 5;
        $nbPages = $this->chapterManager->countPages($nbChapters, $perPage);
            if(isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $nbPages)
            {
                $currentPage = $_GET['page'];
            }else {
                $currentPage = 1;
            }
        $chapters = $this->chapterManager->getAllChapters($currentPage, $perPage);
    
       $this->render('AllChapters', array('allChapters' => $chapters, 'currentPage' => $currentPage, 'nbPages' => $nbPages));
    }

    // Affiche un chapitre /chapter/oneChapter/id
    public function oneChapter()
    {
       $chapterId = $this->request->getParam("id");

        $this->chapterManager = new ChapterManager();
        $this->commentManager = new CommentManager();

        $one = $this->chapterManager->getOneChapter($chapterId);
        $comments = $this->commentManager->getComments($chapterId);

        $this->render('OneChapter', array('oneChapter' => $one, 'comments' => $comments));
    }

    // Créer un chapitre /chapter/newChapter
    public function newChapter()
    {
        $title = $this->request->defaultParam('title');
        $content = $this->request->defaultParam('mytextarea');
        
        if($title && $content)
        {
            $this->redirection('Chapter', 'allChapters');

            $this->chapterManager = new ChapterManager();
            $this->chapterManager->addChapter( $title, $content);
        }
        
        $this->render('NewChapter', array('title' => $title, 'mytextarea' => $content));
    } 

    // Modifier un chapitre  /chapter/changeChapter/id
    public function changeChapter()
    {

        $postId = $this->request->getParam("id");
        $this->chapterManager = new ChapterManager();
        $post = $this->chapterManager->getOneChapter($postId);
        
        if($this->request->paramExist('title') && $this->request->paramExist('mytextarea'))
        {
            $this->redirection('Chapter', 'allChapters');
            $this->chapterManager->modifyChapter(
                 $this->request->getParam("title"),
                 $this->request->getParam("mytextarea"),
                 $postId
            );    
        }
       $this->render('changeChapter', array('changeChapter' => $post));
    }

    // Supprimer un chapitre  /chapter/deleteChapter/id
    public function deleteChapter()
    {
        $postId = $this->request->getParam("id");

        $this->chapterManager = new ChapterManager();
        $post = $this->chapterManager->getOneChapter($postId);

        if(isset($_POST['supprimer'])) {
            $this->chapterManager->removeEpisode($postId);
            $this->redirection('Chapter', 'allChapters');
        }  
        
       $this->render('DeleteChapter', array('deleteChapter' => $post));
    }

     
    /** PROFIL */

    // // Profil Admin  admin/homeAdmin
    public function homeAdmin()
    {     
        $this->render('Admin');           
    }
}
