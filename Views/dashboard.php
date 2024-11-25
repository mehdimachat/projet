<?php
// Démarrer la session pour vérifier si l'utilisateur est connecté
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: addUserconection.php");
    exit();
}

// Afficher les informations de l'utilisateur connecté
echo "Bienvenue, " . $_SESSION['email'];
?>

<!-- Lien pour se déconnecter -->
<a href="addUserconection.php">Se déconnecter</a>

<p>connnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn</p>