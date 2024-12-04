<?php
require_once '../Controller/NotifC.php';

$notifController = new NotifC();

// Vérifier que l'identifiant est fourni dans l'URL
if (isset($_GET['idn'])) {
    // Assurez-vous que l'ID est un entier
    $idn = $_GET['idn'];
    if (!is_numeric($idn)) {
        echo "ID invalide";
        exit;
    }
    $idn = (int) $idn;  // Convertir en entier
    $notification = $notifController->getNotifById($idn); // Récupérer la notification par son ID
    if (!$notification) {
        echo "Notification non trouvée";
        exit;
    }
} else {
    //echo "ID non fourni";
    //exit;
}

// Si le formulaire est soumis, traiter les modifications
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assurer la validation des données soumises
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];

    // Vérification de la validité des données
    if (empty($titre) || empty($contenu)) {
        echo "Tous les champs sont requis.";
        exit;
    }

    // Créer une instance de Notification avec les nouvelles valeurs
    $updatedNotification = new Notif(
        $idn, // Garder l'ID actuel
        $titre, 
        $contenu,
        $notification['id_user'] // Garder l'ID de l'utilisateur qui a créé la notification
    );

    // Appeler la fonction de mise à jour dans le contrôleur
    $notifController->updateNotif($idn, $updatedNotification);

    // Rediriger vers la liste des notifications après modification
    header('Location: listNotif.php');
    exit; // Toujours utiliser exit après header pour stopper l'exécution
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mise à jour de la notification</title>
</head>
<body>
    <h1>Mise à jour de la notification</h1>
    <form action="updateNotif.php?id=<?php echo $idn; ?>" method="POST">
        <label for="titre">Titre :</label><br>
        <input type="text" id="titre" name="titre" value="<?php echo htmlspecialchars($notification['titre']); ?>" required><br><br>

        <label for="contenu">Contenu :</label><br>
        <textarea id="contenu" name="contenu" required><?php echo htmlspecialchars($notification['contenu']); ?></textarea><br><br>

        <input type="submit" value="Mettre à jour">
    </form>
</body>
</html>
