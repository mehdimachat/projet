<?php
require_once '../Controller/UserC.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';
require '../PHPMailer-master/src/Exception.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if ($email) {
        $userC = new UserC();
        $user = $userC->getUserByEmail($email);

        if ($user) {
            // Configuration de PHPMailer
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();                                        // Utilisation de SMTP
                $mail->Host = 'smtp.gmail.com';                        // Serveur SMTP
                $mail->SMTPAuth = true;                                // Authentification SMTP
                $mail->Username = 'machatmehdi2004@gmail.com';             // Remplacez par votre email
                $mail->Password = 'psmuueuvcqlpnsvh';                // Remplacez par votre mot de passe
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    // Cryptage TLS
                $mail->Port = 587;                                     // Port SMTP
                  //psmuueuvcqlpnsvh  yfszhdxefvomlicw
                // Définir l'expéditeur et le destinataire
                $mail->setFrom('machatmehdi2004@gmail.com', 'Learnify');
                $mail->addAddress($user['email'], $user['nom']);       // Adresse e-mail du destinataire

                // Contenu de l'e-mail
                $mail->isHTML(true);
                $mail->Subject = 'Récupération de mot de passe';
                $mail->Body    = "
                    <h1>Bonjour " . htmlspecialchars($user['nom']) . "!</h1>
                    <p>Voici votre mot de passe : <strong>" . htmlspecialchars($user['mot_de_passe']) . "</strong></p>
                    <p>Merci d'utiliser notre service.</p>
                ";

                $mail->send();
                echo "Un e-mail contenant votre mot de passe a été envoyé à $email.";
            } catch (Exception $e) {
                echo "Erreur lors de l'envoi de l'e-mail : " . $mail->ErrorInfo;
            }
        } else {
            echo "Adresse e-mail non trouvée.";
        }
    } else {
        echo "Veuillez entrer une adresse e-mail valide.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié</title>
    <style>
            /* Style du formulaire */
            form {
    position: relative;
    top: 150px; /* Décalage vers le bas */
    left: 700px; /* Décalage vers la droite */
    background-color: grey;
    padding: 20px 30px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Légère ombre pour un effet d'élévation */
    width: 400px;
}

/* Style des étiquettes */
form label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #0060f0f2;
}

/* Style des champs de saisie, des listes déroulantes et du bouton */
form input,
form select,
form button {
    width: 100%; /* Prend toute la largeur */
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

/* Effets de focus */
form input:focus,
form select:focus {
    border-color: #0060f0f2;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 96, 240, 0.5);
}

/* Style du bouton */
form button {
    background-color: #0060f0f2;
    color: white;
    font-weight: bold;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Effet de survol du bouton */
form button:hover {
    background-color: #0050d1;
}
.error-message {
            font-size: 0.9em;
            color: red;
            margin-left: 10px;
        }
        .success-message {
            font-size: 0.9em;
            color: green;
            margin-left: 10px;
          
        }
        footer{
          color: black;
        }
        .button {
  position: relative;
  top: 150px; /* Décalage vers le bas */
  left: 700px; /* Décalage vers la droite */
  display: inline-block; /* Permet de contrôler la largeur et hauteur */
  padding: 10px 20px;    /* Espace intérieur pour agrandir le bouton */
  background-color: #007BFF; /* Couleur de fond du bouton */
  color: white;          /* Couleur du texte */
  text-decoration: none; /* Supprime le soulignement */
  border-radius: 5px;    /* Arrondi des coins */
  font-size: 16px;       /* Taille du texte */
  font-weight: bold;     /* Texte en gras */
  border: 2px solid transparent; /* Bordure invisible */
  transition: background-color 0.3s, border-color 0.3s; /* Animation fluide */
}

.button:hover {
  background-color: #0056b3; /* Couleur au survol */
  border-color: #004080;    /* Bordure plus visible au survol */
  cursor: pointer;          /* Curseur en forme de main */
}
          </style>
</head>
<body>
<a href="addUserconection.php" class="button">Return</a>
    <h2>Mot de passe oublié</h2>
    <form method="post" action="">
        <label for="email">Entrez votre adresse e-mail :</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>