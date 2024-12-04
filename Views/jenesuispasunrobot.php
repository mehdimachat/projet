<?php
session_start();

// Définir les directions possibles et leurs représentations en émojis
$directions = [
    'haut' => '⬆️',
    'bas' => '⬇️',
    'gauche' => '⬅️',
    'droite' => '➡️'
];

// Initialiser ou réinitialiser les étapes et le score
if (!isset($_SESSION['current_step'])) {
    $_SESSION['current_step'] = 0;
    $_SESSION['score'] = 0;
    $_SESSION['errors'] = 0; // Pour suivre le nombre d'erreurs
}

// Générer une direction aléatoire pour l'étape actuelle si nécessaire
if (!isset($_SESSION['correct_direction']) || $_SESSION['current_step'] == 0) {
    $random_direction = array_rand($directions);
    $_SESSION['correct_direction'] = $random_direction; // Stocker la bonne direction
}

// Si une réponse est soumise
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selected_direction = $_POST['direction'];

    // Vérifier la réponse de l'utilisateur
    if ($selected_direction === $_SESSION['correct_direction']) {
        $_SESSION['score']++; // Augmenter le score si la réponse est correcte
    } else {
        $_SESSION['errors']++; // Augmenter le nombre d'erreurs si la réponse est incorrecte
    }

    $_SESSION['current_step']++; // Passer à l'étape suivante

    // Vérifier si l'utilisateur a répondu aux 4 questions
    if ($_SESSION['current_step'] >= 4) {
        // Rediriger après avoir répondu aux 4 questions
        if ($_SESSION['errors'] === 0) {
            // Si aucune erreur, rediriger vers addUserconection.php
            header("Location: addUserconection.php");
        } else {
            // Si au moins une erreur, rediriger vers homefront.php
            header("Location: addUserconection.php");
        }
        
        // Fermer la session après la redirection
        session_unset(); // Supprime toutes les variables de session
        session_destroy(); // Détruit la session
        exit();
    } else {
        // Générer une nouvelle direction pour la prochaine étape si ce n'est pas la dernière
        $random_direction = array_rand($directions);
        $_SESSION['correct_direction'] = $random_direction;
    }
}

// Réinitialiser la session si l'utilisateur choisit de recommencer via l'URL
if (isset($_GET['reset']) && $_GET['reset'] == 'true') {
    session_unset(); // Supprime toutes les variables de session
    session_destroy(); // Détruit la session

    // Réinitialiser la session si nécessaire
    session_start();
    $_SESSION['current_step'] = 0;
    $_SESSION['score'] = 0;
    $_SESSION['errors'] = 0;
    $random_direction = array_rand($directions);
    $_SESSION['correct_direction'] = $random_direction;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Je ne suis pas un robot</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        .emoji {
            font-size: 100px;
            margin: 20px;
        }
        button {
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php if ($_SESSION['current_step'] < 4): ?>
        <h1>Étape <?= $_SESSION['current_step'] + 1 ?> / 4</h1>
        <p>Sélectionnez la direction correcte :</p>

        <!-- Afficher l'émoji -->
        <div class="emoji"><?= $directions[$_SESSION['correct_direction']] ?></div>

        <!-- Formulaire pour les options -->
        <form method="post">
            <?php foreach ($directions as $direction => $emoji): ?>
                <button type="submit" name="direction" value="<?= $direction ?>"><?= ucfirst($direction) ?></button>
            <?php endforeach; ?>
        </form>
    <?php else: ?>
        <h1>Vous avez terminé !</h1>
        <p>Votre score est de <?= $_SESSION['score'] ?> et vous avez <?= $_SESSION['errors'] ?> erreurs.</p>
        <p>Pour recommencer, rechargez la page avec le paramètre ?reset=true dans l'URL.</p>
    <?php endif; ?>
</body>
</html>