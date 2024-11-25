<?php
session_start();
require_once '../config.php';
require_once '../Model/User.php';
require_once '../Controller/UserC.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Vérifiez que l'email est valide
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Email invalide.";
        header("Location: forgot_password.php");
        exit();
    }

    $userC = new UserC();
    $user = $userC->getUserByEmail($email);

    if ($user) {
        // Récupérer le mot de passe
        $password = $user['mot_de_passe'];

        // Envoyer un email
        $to = $email;
        $subject = "Récupération de mot de passe";
        $message = "Bonjour " . $user['prenom'] . ",\n\nVotre mot de passe est : " . $password . "\n\nMerci de sécuriser vos informations.";
        $headers = "From: no-reply@votreprojet.com";

        if (mail($to, $subject, $message, $headers)) {
            $_SESSION['success'] = "Un email contenant votre mot de passe a été envoyé.";
        } else {
            $_SESSION['error'] = "Échec de l'envoi de l'email.";
        }
    } else {
        $_SESSION['error'] = "Aucun compte trouvé avec cet email.";
    }

    header("Location: forgot_password.php");
    exit();
}
?>