<?php

namespace App\Models;



/** Gestion des messages 'flash' */
class Messages 
{
    public static function setMsg($text, $type) 
    {
        if ($type == "error") {
            $_SESSION['errorMsg'] = $text;
        } elseif ($type == "success") {
            $_SESSION['successMsg'] = $text;
        }
    }

    public static function displayMsg() 
    {
        if (isset($_SESSION['errorMsg'])) {
            echo '<div class="alert alert-danger" role="alert"><strong>'. $_SESSION['errorMsg'].'</strong></div>';
            unset($_SESSION['errorMsg']);
        } 
        elseif (isset($_SESSION['successMsg'])) {
            echo '<div class="alert alert-success" role="alert"><strong>'. $_SESSION['successMsg'].'</strong></div>';
            unset($_SESSION['successMsg']);
        }
    }
}