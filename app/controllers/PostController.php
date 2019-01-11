<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\manager\PostManager;
use App\Models\manager\PostsManager;
use App\Models\manager\CommentManager;
use App\Models\Messages;

class PostController extends Controller
{
    private $postManager;
    private $commentManager;
    // Affichage de l'ensemble des commentaires associés à un billet
    public function postComment()
    {
       $chapterId = $this->request->getParam("id");

        $this->postManager = new PostManager();
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

        $chapter = $this->postManager->getOne($chapterId);
        $comments = $this->commentManager->getComments($chapterId, $currentPage, $perPage);

        $this->render('Post', array('postComment' => $chapter, 'comments' => $comments, 'currentPage' => $currentPage, 'nbPages' => $nbPages));

    }

    // Permet d'ajouter un commentaire
    public function addComment()
    {
        // print_r($this->request);
        // var_dump( $this->request->getParam("postId"));
        // die();

          if(!empty($_POST['author']) AND !empty($_POST['commentUser']))
          {
            $chapterId = $this->request->getParam("postId");
            $author = $this->request->getParam("author");
            $content = $this->request->getParam("commentUser");

            $this->commentManager = new commentManager();
            $comment = $this->commentManager->addComment($chapterId, $author, $content);// Ajout dans bdd
          }
          // else {
          //   $this->messages = new Messages;
          //   $this->messages->setMsg('Veuillez compléter tous les champs !', 'error');
          // }
    }

    // Signale un commentaire pour modération
    public function moderateComment()
    {
        $this->commentManager = new commentManager();

        $id = $this->request->getParam("id");

        $comment = $this->commentManager->getComment($id);
        $this->commentManager->reportComment($id);

    }
}
