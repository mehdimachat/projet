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
public function getUserByName($nom, $prenom) {
    $sql = "SELECT * FROM User WHERE nom = :nom AND prenom = :prenom";
    $db = Config::getConnexion();
    $query = $db->prepare($sql);
    $query->execute(['nom' => $nom, 'prenom' => $prenom]);
    return $query->fetch(); // Retourne l'utilisateur si trouvé, sinon false
}
public function listUserBy($column, $order) {
    $allowedColumns = ['id', 'nom', 'email']; // Colonnes autorisées
    $allowedOrders = ['ASC', 'DESC']; // Ordres autorisés

    // Validation des entrées
    if (!in_array($column, $allowedColumns) || !in_array($order, $allowedOrders)) {
        throw new Exception("Critère de tri invalide.");
    }

    // Requête SQL avec tri
    $sql = "SELECT * FROM User ORDER BY $column $order";
    $db = Config::getConnexion();
    try {
        $query = $db->query($sql);
        return $query->fetchAll();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
public function envoyerMotDePasse($email) {
    $user = $this->getUserByEmail($email);
    if ($user) {
        $motDePasse = $user['mot_de_passe'];
        
        // Envoi de l'email
        $to = $email;
        $subject = "Récupération de votre mot de passe";
        $message = "Bonjour,\n\nVoici votre mot de passe : " . $motDePasse;
        $headers = "From: no-reply@votre-site.com";

        if (mail($to, $subject, $message, $headers)) {
            echo "Un email contenant votre mot de passe a été envoyé.";
        } else {
            echo "Erreur lors de l'envoi de l'email.";
        }
    } else {
        echo "Aucun utilisateur trouvé avec cet email.";
    }
}

}
?>