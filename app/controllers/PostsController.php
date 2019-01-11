<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\manager\PostsManager;

class PostsController extends Controller
{
    private $postsManager;
    
    public function posts()
    {
        $this->postsManager = new PostsManager();
        $posts = $this->postsManager->getAll();
        
        $this->render('Posts', array('posts' => $posts));       
    }
}