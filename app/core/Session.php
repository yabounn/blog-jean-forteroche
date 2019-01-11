<?php
namespace App\Core;

class Session
{
    /**
     * Création d'une session
     */
    public function start()
    {
        session_start();
        // var_dump($_SESSION);

    }

    /**
     * Destruction d'une session
     */
    public function destroy()
    {
        session_start();
        session_destroy();
    }

    /**
     *  Ajout d'un attribut à la session
     */
    public function setAttribut($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     *  Renvoie vrai si l'attribut existe dans la session
     */
    public function isAttribut($key)
    {
        return (isset($_SESSION[$key]) && $_SESSION[$key] !='');
    }

    /**
     *  Renvoie la valeur de l'attribut demandé
     */
    public function getAttribut($key)
    {
        if ($this->isAttribut($key)) {
            return $_SESSION[$key];
        }
        else {
            throw new Exception("L'attribut " . $name . " n'existe pas.");
        }
    }
}