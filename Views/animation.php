<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Éducatif</title>
    <style>
        /* Styles de base */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
            overflow: hidden;
        }

        h1 {
            text-align: center;
            font-size: 3rem;
            margin-top: 50px;
            opacity: 0;
            animation: fadeIn 2s forwards 1s;
        }

        .subtext {
            text-align: center;
            font-size: 1.5rem;
            margin-top: 10px;
            opacity: 0;
            animation: fadeIn 2s forwards 2s;
        }

        /* Animation pour le texte */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animation pour les cercles */
        .circles {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .circle {
            position: absolute;
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            animation: float 8s infinite ease-in-out;
        }

        @keyframes float {
            from {
                transform: translateY(0);
            }
            to {
                transform: translateY(-100vh);
            }
        }

        /* Positionnement aléatoire */
        .circle:nth-child(1) {
            left: 10%;
            animation-duration: 6s;
            animation-delay: 0s;
        }

        .circle:nth-child(2) {
            left: 25%;
            animation-duration: 10s;
            animation-delay: 2s;
        }

        .circle:nth-child(3) {
            left: 50%;
            animation-duration: 7s;
            animation-delay: 4s;
        }

        .circle:nth-child(4) {
            left: 75%;
            animation-duration: 9s;
            animation-delay: 3s;
        }

        .circle:nth-child(5) {
            left: 90%;
            animation-duration: 11s;
            animation-delay: 1s;
        }

        /* Bouton animé */
        .btn {
            display: block;
            margin: 30px auto;
            padding: 10px 20px;
            font-size: 1.2rem;
            color: #fff;
            background: #ff6f61;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, background 0.3s ease;
        }

        .btn:hover {
            transform: scale(1.1);
            background: #ff8566;
        }
    </style>
</head>
<body>
    <h1>Bienvenue sur Learnify</h1>
    <p class="subtext">Votre plateforme éducative pour un apprentissage interactif et moderne</p>
    <button class="btn">Commencez Maintenant</button>

    <!-- Cercles d'animation -->
    <div class="circles">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>
</body>
</html>