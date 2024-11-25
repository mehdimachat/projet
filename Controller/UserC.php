<?php
require_once '../config.php';
require_once '../Model/User.php';

class UserC
{
    public function addUser($user)
    {
        $sql = "INSERT INTO User (id, nom, prenom, cin, email, mot_de_passe, role, telephone, adresse)
                VALUES (NULL, :nom, :prenom, :cin, :email, :mot_de_passe, :role, :telephone, :adresse)";
                
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom' => $user->getNom(),
                'prenom' => $user->getPrenom(),
                'cin' => $user->getCin(),
                'email' => $user->getEmail(),
                'mot_de_passe' => $user->getMotDePasse(),
                'role' => $user->getRole(),
                'telephone' => $user->getTelephone(),
                'adresse' => $user->getAdresse(),
            ]);
            echo "ajouté avec succès";
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
    public function listUser() {
        $sql = "SELECT * FROM User";
        $db = Config::getConnexion();
        try {
            $query = $db->query($sql);
            return $query->fetchAll();
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function deleteUser($id) {
        $sql = "DELETE FROM User WHERE id = :id";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id' => $id]);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function getUserById($id) {
        // SQL pour récupérer les données de l'utilisateur avec l'ID spécifique
        $sql = "SELECT * FROM User WHERE id = :id"; // Ajustez le nom de la table si nécessaire
        $db = config::getConnexion(); // Connexion à la base de données
        $query = $db->prepare($sql); // Préparer la requête SQL
        $query->execute(['id' => $id]); // Exécuter la requête avec le paramètre id
        return $query->fetch(); // Récupérer les résultats sous forme de tableau associatif
    }
    public function updateUser($id, $user) {
        // SQL pour mettre à jour les informations d'un utilisateur
        $sql = "UPDATE User SET 
                    nom = :nom,
                    prenom = :prenom,
                    cin = :cin,
                    email = :email,
                    mot_de_passe = :mot_de_passe,
                    role = :role,
                    telephone = :telephone,
                    adresse = :adresse
                WHERE id = :id";
        
        // Connexion à la base de données
        $db = config::getConnexion();
        $query = $db->prepare($sql);
    
        // Exécution de la requête avec les valeurs de l'utilisateur
        $query->execute([
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'cin' => $user->getCin(),
            'email' => $user->getEmail(),
            'mot_de_passe' => $user->getMotDePasse(),
            'role' => $user->getRole(),
            'telephone' => $user->getTelephone(),
            'adresse' => $user->getAdresse(),
            'id' => $id
        ]);
    }
    public function loginUser($email, $mot_de_passe)
{
    $sql = "SELECT * FROM User WHERE email = :email AND mot_de_passe = :mot_de_passe";
    $db = Config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'email' => $email,
            'mot_de_passe' => $mot_de_passe
        ]);
        return $query->fetch(); // Retourne l'utilisateur si trouvé
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}


public function getUserByEmail($email) {
    $db = config::getConnexion();
    $sql = "SELECT * FROM User WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC); // Retourne l'utilisateur trouvé ou false si non trouvé
}


}
?>