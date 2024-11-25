<?php
class Config
{
    private static ?PDO $pdo = null;

    public static function getConnexion()
    {
        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO(
                    'mysql:host=localhost;dbname=projet', // Remplacez "atelierPHP" par le nom de votre base de données
                    'root', // Remplacez 'root' par votre nom d'utilisateur
                    '', // Remplacez '' par votre mot de passe
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    ]
                );
                // echo "Connected successfully"; // Décommenter pour tester la connexion
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}

// Exemple d'appel de la méthode pour établir la connexion
Config::getConnexion();

?>