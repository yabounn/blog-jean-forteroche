<?php
namespace App\Core;

class Config {

    private static $params;

    // Renvoie la valeur d'un paramètre de configuration
    public static function get($name, $paramsValue = null) 
    {
        $params =self::getParams();
        if(isset(self::getParams()[$name])) {
            $value = self::getParams()[$name];
        }
        else {
            $value = $paramsValue;
        }    
        return $value;
    }

    // Renvoie le tableau des paramètres
    private static function getParams() 
    {
        if (self::$params == null) {
            $filePath = __DIR__ . '/../config/prod.ini';
            if (!file_exists($filePath)) {
                $filePath = __DIR__ . '/../config/dev.ini';  
            }
            if (!file_exists($filePath)) 
            {
                throw new Exception('Il n\'existe pas de fichier de configuration.');
            }
            else {
                self::$params = parse_ini_file($filePath);
            } 
        }
        return self::$params;
    }
}