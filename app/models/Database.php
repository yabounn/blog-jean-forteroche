<?php
namespace App\Models;
use App\Core\Config;

 class Database{

    protected static $db;

    // Exécuter une requête sql
    protected function runReq($req, $params = [])
    {

        $result = self::getDb()->prepare($req);
        $result->execute($params);

        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    // Méthode pour insert into car sinon erreur fatale avec un fetch
    protected function ina($req, $params = [])
    {
        $result = self::getDb()->prepare($req);
        $result->execute($params);

        return $result;
    }

    // Exécute la requête pour l'affichage du contenu d'un billet
    protected function show($req, $params = [])
    {
        $result = self::getDb()->prepare($req);
        $result->execute($params);

        return $result->fetch(\PDO::FETCH_ASSOC);
    }


    // Connexion à la base de données et gestion des erreurs
    private static function getDb()
    {
        if (self::$db === null) {

            // Récupération des paramètres de configuration
            $dsn = Config::get('dsn');
            $login = Config::get('login');
            $pwd = Config::get('pwd');

            $options = [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION];

            // Création de la connexion
            self::$db = new \PDO ($dsn, $login, $pwd, $options);
        }
        return self::$db;
    }
}
