<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\manager\UserManager;
use App\Models\Messages;

class AuthController extends Controller
{
    private $userManager;

    /**
    * Login
    */
    public function login()
    { 
        // var_dump($_SESSION);
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $this->render('Auth');
            return; 
         }
        if ($this->request->paramExist('username') && $this->request->paramExist('password')) 
        {
            $username = $this->request->getParam("username");
            $password = $this->request->getParam("password");

            $this->userManager = new UserManager;
            $user =$this->userManager->getUser($username);
            if (null != $user) {
                if (password_verify($password, $user->getPassword())) {
                    $this->request->getSession()->setAttribut('user', $user);
                    $this->redirection('User', 'userAdmin');
                }else {
                    $this->messages = new Messages;
                    $this->messages->setMsg('Erreur d\'identifiants !', 'error');
                }
            }else {
                $this->messages = new Messages;
                $this->messages->setMsg('Les identifiants sont incorrects !', 'error');
            }
                 
        }else {
            $this->messages = new Messages;
            $this->messages->setMsg('Veuillez compléter tous les champs !', 'error');
        }
        $this->render('Auth');
    }

    /**
    * Logout
    */
    public function logout()
    {
        $this->request->getSession()->destroy();
        $this->redirection('Auth', 'login');
    }
}