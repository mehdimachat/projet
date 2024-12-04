<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier Année Scolaire 2024-2025</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e0f7fa; /* Fond bleu clair */
            color: #004080; /* Texte en bleu foncé */
        }
        .calendar-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }
        .month {
            border: 2px solid #004080; /* Bordure bleue */
            background-color: #ffffff; /* Fond blanc */
            margin: 15px;
            padding: 15px;
            border-radius: 12px;
            width: 360px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out;
        }
        .month:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }
        .month h3 {
            text-align: center;
            background: linear-gradient(90deg, #004080, #0066cc); /* Dégradé bleu */
            color: white;
            margin: -15px -15px 10px -15px;
            padding: 10px;
            border-radius: 10px 10px 0 0;
        }
        .days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            text-align: center;
            font-size: 14px;
        }
        .day {
            padding: 8px;
            border-radius: 8px;
            transition: background-color 0.2s;
        }
        .day.header {
            font-weight: bold;
            background-color: #cce7ff; /* Bleu pâle pour les en-têtes */
            color: #002147; /* Texte bleu foncé */
            border-radius: 8px;
        }
        .day:hover {
            background-color: #a7c8e8; /* Bleu moyen pour survol */
            cursor: pointer;
        }
        .day.active {
            background-color: #004080; /* Bleu foncé pour la date active */
            color: white;
            font-weight: bold;
            border-radius: 50%;
            box-shadow: 0 0 10px 2px rgba(0, 64, 128, 0.5);
        }
        .button {
  position: relative;
  top: -70px; /* Décalage vers le bas */
  left: 70px; /* Décalage vers la droite */
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


    <h1 style="text-align: center; padding: 20px; color: #002147;">Calendrier Année Scolaire 2024-2025</h1>
    <a href="homefront.php" class="button">Return Home</a>
    <div class="calendar-container">
        <!-- Génération des mois dynamiquement avec PHP -->
        <?php
        function renderMonth($month, $year) {
            $daysOfWeek = ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'];
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            $firstDayOfMonth = date('N', strtotime("$year-$month-01"));

            echo "<div class='month'>";
            echo "<h3>" . date('F Y', strtotime("$year-$month-01")) . "</h3>";
            echo "<div class='days'>";

            // En-têtes
            foreach ($daysOfWeek as $day) {
                echo "<div class='day header'>" . $day . "</div>";
            }

            // Espaces vides pour la première semaine
            for ($i = 1; $i < $firstDayOfMonth; $i++) {
                echo "<div class='day'></div>";
            }

            // Jours du mois
            for ($day = 1; $day <= $daysInMonth; $day++) {
                $date = "$year-$month-$day";
                $isToday = (date('Y-m-d') == $date) ? "active" : "";
                echo "<div class='day $isToday'>$day</div>";
            }

            echo "</div>"; // Fermeture de days
            echo "</div>"; // Fermeture du mois
        }

        // Génération des mois de septembre 2024 à juin 2025
        $startYear = 2024;
        $endYear = 2025;
        for ($month = 9; $month <= 12; $month++) {
            renderMonth($month, $startYear);
        }
        for ($month = 1; $month <= 6; $month++) {
            renderMonth($month, $endYear);
        }
        ?>
    </div>
</body>
</html>