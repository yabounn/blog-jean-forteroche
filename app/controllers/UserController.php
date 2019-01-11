<?php
namespace App\Controllers;

use App\Core\Controller;
// use App\Core\SecureController;
use App\Models\manager\UserManager;
use App\Models\Messages;

// class UserController extends SecureController
class UserController extends Controller

{
    private $userManager;

    // Page home de l'administration
    public function userAdmin()
    {
        // var_dump($_SESSION);
        $this->render('Admin');
    }

    // Création du profil utilisateur
    public function createUser()
    {
        if ($this->request->paramExist('username') && $this->request->paramExist('password') && $this->request->paramExist('passwordConfirm') && $this->request->paramExist('email')) 
        {
            $this->userManager = new UserManager;
            $user = $this->userManager->newUser(
                    $this->request->getParam("username"),
                    $this->request->getParam("password"),
                    $this->request->getParam("passwordConfirm"),
                    $this->request->getParam("email")
                    );
        }
        $this->render('createUser');
    }

    // Modifier un profil
    public function modifyUser()
    {

    }

/**
 * MOT DE PASSE OUBLIÉ
 */
    // Vérification de la validité du mail transmis
    public function forgetPass()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $this->render('forgetPass');
            return; 
         }

         if (isset($_POST['recup_submit'])) {
            if (isset($_POST['recup_mail']) && !empty($_POST['recup_mail'])){
                $recup_mail = htmlspecialchars($_POST['recup_mail']);
                if(filter_var($recup_mail,FILTER_VALIDATE_EMAIL)){
                    $this->userManager = new UserManager;
                    $mailExist = $this->userManager->mailExist($recup_mail);
                    if($mailExist){
                        $this->request->getSession()->setAttribut("recup_mail", $recup_mail);
                        $this->redirection('User', 'recoveryMail');
                    }else {
                        $this->messages = new Messages;
                        $this->messages->setMsg('Adresse mail incorrecte !', 'error');
                    }                  
                }else {
                    $this->messages = new Messages;
                    $this->messages->setMsg('Adresse mail non valide !', 'error');
                }
            }else {
                $this->messages = new Messages;
                $this->messages->setMsg('Veuillez entrer une adresse mail !', 'error');
            }   
        }
        $this->render('forgetPass');     
    }

    // Création du code de vérification et envoyé par mail
    public function recoveryMail()
    {
        // var_dump($_SESSION['recup_mail']);
        $recup_mail = $_SESSION['recup_mail'];
        if ($recup_mail ) {
            $recup_code = "";
            for ($i=1; $i < 9; $i++) {
                $recup_code .=mt_rand(1, 9);
            }
            $this->request->getSession()->setAttribut("recup_code", $recup_code);
            $this->userManager = new UserManager;
            $email_recup_exist = $this->userManager->emailRecupExist($recup_mail);
            if ($email_recup_exist == 0) {
                $recup_insert = $this->userManager->recupInsert($recup_mail, $recup_code);
                $sendmail = $this->userManager->sendMail($recup_code);
            }
            $this->verifCode($recup_code);
        }
    }

    // Vérification du code transmis 
    public function verifCode($recup_code)
    { 
        // var_dump($recup_code);
        if (isset($_POST['verif_submit'])){
            if(isset($_POST['verif_code']) && !empty($_POST['verif_code'])){
                $verif_code = htmlspecialchars($_POST['verif_code']);
                $this->userManager = new UserManager;
                $recup_mail = $_SESSION['recup_mail']; 
                $is_Code = $this->userManager->isCode($recup_mail,$verif_code);
                if($is_Code == 1){
                    $this->redirection('User', 'newPass');
                     $del_email = $this->userManager->delMail($recup_mail);
                }else{
                    $this->messages = new Messages;
                    $this->messages->setMsg('Code incorrect !', 'error');
                }
            }else{
                $this->messages = new Messages;
                $this->messages->setMsg('Veuillez entrer votre code', 'error');
            }     
        }
        $this->render('recoveryMail');
    }


    public function newPass()
    {
        if(isset($_POST['validate_submit'])){
            if(isset($_POST['newPass']) && !empty($_POST['newPass'])){
                if(isset($_POST['newPassVerif']) && !empty($_POST['newPassVerif'])){
                    $newPass = htmlspecialchars($_POST['newPass']);
                    $newPassVerif = htmlspecialchars($_POST['newPassVerif']);
                    if($newPass == $newPassVerif){
                        $this->request->getSession()->setAttribut("newPass", $newPass);
                        $this->userManager = new UserManager;
                        $newPass = $_SESSION['newPass'];
                        $email = $_SESSION['recup_mail'];
                        $createNewPass = $this->userManager->createNewPass($newPass,$email);
                        $this->redirection('user', 'userAdmin');
                    }else {
                        $this->messages = new Messages;
                        $this->messages->setMsg('Les mots de passe ne correspondent pas!', 'error');
                    }
                }else {
                    $this->messages = new Messages;
                    $this->messages->setMsg('Veuillez confirmer votre nouveau mot de passe', 'error');
                }
            }else {
                $this->messages = new Messages;
                $this->messages->setMsg('Veuillez indiquer votre nouveau mot de passe', 'error');
            }

        }
        $this->render('newPass');

    }
}