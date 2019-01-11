<?php
namespace App\Controllers;

use App\Core\SecureController;
use App\Models\manager\CommentManager;
use App\Models\manager\ChapterManager;
use App\Models\Messages;

class CommentController extends SecureController
{
    private $commentManager;
    private $chapterManager;

    // Affiche l'ensemble des commentaires /comment/allComments
    public function allComments()
    {
        $this->commentManager = new CommentManager();
        $this->chapterManager = new ChapterManager();

        
         
        $nbComments = $this->commentManager->countComments();
        $perPage = 5;
        $nbPages = $this->commentManager->countPages($nbComments, $perPage);
            if(isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $nbPages)
            {
                $currentPage = $_GET['page'];
            }else {
                $currentPage = 1;
            }
        $comments = $this->commentManager->commentsAll($currentPage, $perPage);
        $chapters = $this->chapterManager->getAllChapters($currentPage, $perPage);
        

       $this->render('AllComments', array('allComments' => $comments,'allChapters' => $chapters, 'currentPage' => $currentPage, 'nbPages' => $nbPages));
    //    $this->render('AllComments', array('allComments' => $comments, 'oneChapter' => $one, 'currentPage' => $currentPage, 'nbPages' => $nbPages));
            
    }

    // Validation d'un commentaire par l'admin /comment/validate/commentId
    public function validate()
    {
        $this->commentManager = new CommentManager();
        $commentId = $this->request->getParam("id");
        $this->commentManager->validateComment($commentId);
        $this->redirection('comment', 'allComments');
    }

    // Suppression d'un commentaire par l'admin /comment/validate/commentId
    public function delete()
    {
        $this->commentManager = new CommentManager();
        $commentId = $this->request->getParam("id");
        $this->commentManager->deleteComment($commentId);
        $this->redirection('comment', 'allComments');
    }

    // Permet de trier les commentaires signalés
    public function commentsReported()
    {
        $this->commentManager = new CommentManager();
        $nbComments = $this->commentManager->countComments();
        $perPage = 5;
        $nbPages = $this->commentManager->countPages($nbComments, $perPage);
            if(isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $nbPages)
            {
                $currentPage = $_GET['page'];
            }else {
                $currentPage = 1;
            }
        $commentsReported = $this->commentManager->getAllCommentsPerReport($currentPage, $perPage);
        $this->render('commentsReported', array('commentsReported' => $commentsReported, 'currentPage' => $currentPage, 'nbPages' => $nbPages));
    }
    
 
}