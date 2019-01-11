<?php
namespace App\Models\manager;

use App\Models\Database;
use App\Models\User;

class UserManager extends Database
{

    // Vérifie si utilisateur identifié dans la bdd
    public function getUser($username)
    {
        $req = 'SELECT id, username, password FROM user WHERE username = ? ';
        $result = $this->show($req, [$username]);

        if (!$result) {
            return null;
        }
        return new User($result);
    }

    // Création du profil utilisateur
    public function newUser($username, $password, $email)
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $req = 'INSERT INTO user(username, password, email) VALUES (?, ?, ?)';
        $result = $this->ina($req, [$username, $passwordHash, $email]);
        return $result;
    }

    // Création d'un nouveau mot de passe
    public function createNewPass($newPass,$email)
    {

        $newPassHash = password_hash($newPass, PASSWORD_DEFAULT);
        $req = 'UPDATE user SET password = ? WHERE email = ?';
        $result = $this->ina($req, [$newPassHash, $email]);
        return $result;
    }


/**
 * REINITIALISATION DU MOT DE PASSE
 */
    // Vérification email présent dans bdd
    public function mailExist($recup_mail)
    {
        $req = 'SELECT id FROM user  WHERE email = ?';
        $result = $this->show($req, [$recup_mail]);
        return $result;
    }


    public function emailRecupExist($recup_mail)
    {
        $req = 'SELECT id FROM forgetpass  WHERE email = ?';
        $result = $this->ina($req, [$recup_mail]);
        $result = $result->rowCount();
        return $result;
    }

    public function recupUpdate($recup_code, $recup_mail)
    {
        $req = 'UPDATE forgetpass SET code = ? WHERE email = ?';
        $result = $this->ina($req, [$recup_code, $recup_mail]);
        return $result;
    }

    public function recupInsert($recup_mail, $recup_code)
    {
        $req = 'INSERT INTO forgetpass(email,code) VALUES (?, ?)';
        $result = $this->ina($req, [$recup_mail, $recup_code]);
        return $result;
    }

    // Envoie mail
    public function sendMail($recup_code)
    {
        ini_set('SMTP','smtp.free.fr');
        ini_set('sendmail_from','ocphpyb@gmail.com');
        $mail = 'bcd.yann@gmail.com';
        $sujet = 'Récupération de mot de passe';
        $message = 'Voici votre code de récupération : '.$recup_code.'
        ';
        // Envoi du mail
        mail($mail, $sujet, $message);
    }

    public function isCode($recup_mail,$verif_code)
    {
        $req = 'SELECT id FROM forgetpass  WHERE email = ? AND code = ?';
        $result = $this->ina($req, [$recup_mail, $verif_code]);
        $result = $result->rowCount();
        return $result;
    }

    public function delMail($recup_mail)
    {
        $req ='DELETE FROM forgetpass WHERE email = ?';
        $result = $this->ina($req, [$recup_mail]);
        return $result;
    }
}
