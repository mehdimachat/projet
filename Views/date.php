<?php
require_once '../config.php';
require_once '../Model/User.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un utilisateur</title>
    <style>
        #clock {
            font-size: 2rem;
            font-family: 'Arial', sans-serif;
            width: 250px;
            padding: 20px;
            border: 2px solid #333;
            border-radius: 10px;
            background-color: #f4f4f4;
            text-align: center;
            margin: 20px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            
        }
        #date {
            font-size: 1.2rem;
            margin-top: 10px;
            color: #666;
        }
    </style>
</head>
<body>

    <!-- Affichage de la montre dynamique -->
    <div id="clock">
        <div id="time"></div>
        <div id="date"></div>
    </div>

    <!-- Script JavaScript pour mettre à jour l'heure et la date en temps réel -->
    <script>
        function updateClock() {
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');
            const year = now.getFullYear();
            const month = (now.getMonth() + 1).toString().padStart(2, '0');
            const day = now.getDate().toString().padStart(2, '0');

            const timeString = `${hours}:${minutes}:${seconds}`;
            const dateString = `${day}/${month}/${year}`;

            document.getElementById('time').innerText = timeString;
            document.getElementById('date').innerText = dateString;
        }

        // Mettre à jour l'heure immédiatement et puis toutes les secondes
        setInterval(updateClock, 1000);
        updateClock(); // Appel initial pour afficher l'heure sans attendre une seconde
    </script>
</body>
</html>