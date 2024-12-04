<?php
require_once '../Controller/NotifC.php';

// Vérifie si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $id = $_POST['id']; // ID de l'utilisateur associé à la notification

    // Crée un objet Notification et initialise les valeurs
    $notif = new Notif(null, $titre, $contenu, $id);

    // Appelle la fonction d'ajout
    $notifC = new NotifC();
    $notifC->addNotif($notif);

    // Redirige vers la liste des notifications
    header("Location: listUser.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Notification</title>
    <link rel="stylesheet" href="style.css"> <!-- Ajoutez votre fichier CSS ici -->
   <style>
    form {
              position: relative;
              top: 10px; /* Décalage vers le bas */
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
                      margin-left: 10px;
                  }
          </style>
</head>
<body>
    <h1>Ajouter une Notification</h1>
    <form action="addNotif.php" method="POST">
        <div>
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" required>
        </div>
        <div>
            <label for="contenu">Contenu :</label>
            <textarea id="contenu" name="contenu" required></textarea>
        </div>
        <div>
            <label for="id">Utilisateur :</label>
            <select id="id" name="id" required>
                <?php
                require_once '../Controller/UserC.php';
                $userC = new UserC();
                $users = $userC->listUser();
                foreach ($users as $user) {
                    echo "<option value='" . htmlspecialchars($user['id']) . "'>" . htmlspecialchars($user['nom'] . " " . $user['prenom']) . "</option>";
                }
                ?>
            </select>
        </div>
        <div>
            <button type="submit">Ajouter</button>
        </div>
    </form>
    <a href="listNotif.php">Retour à la liste des Notifications</a>
</body>
</html>