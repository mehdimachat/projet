<?php 
require_once '../Model/User.php';

// Le code PHP pour le formulaire reste inchangé
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice Scientifique</title>
    <link rel="stylesheet" href="calculator.css">
</head>
  <style>
   body {
    font-family: 'Roboto', Arial, sans-serif;
    background-color: #f3f4f6;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Conteneur de la calculatrice */
.calculator-container {
    text-align: center;
    max-width: 400px;
    margin: auto;
}

/* Titre */
.calculator h2 {
    color: #0077ff;
    font-size: 1.5em;
    margin-bottom: 15px;
}

/* Calculatrice */
.calculator {
    background: #ffffff;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

/* Écran */
#display {
    width: 80%;
    padding: 15px;
    font-size: 1.5em;
    border: 1px solid #ddd;
    border-radius: 10px;
    margin-bottom: 15px;
    text-align: right;
    background-color: #f7f7f7;
}

/* Grille des touches */
.keys {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 10px;
}

/* Boutons */
button {
    padding: 15px;
    font-size: 1.2em;
    font-weight: bold;
    color: #ffffff;
    background-color: #0077ff;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.1s;
}

/* Effets au survol */
button:hover {
    background-color: #005bb5;
}

/* Effets lors du clic */
button:active {
    transform: scale(0.95);
}

/* Touches spéciales */
button:nth-child(4n) {
    background-color: #ff7043; /* Couleur orange pour les opérateurs */
}

button:nth-child(4n):hover {
    background-color: #e64a19;
}
            /* Style du formulaire */
                   .button {
  position: relative;
  top: -300px; /* Décalage vers le bas */
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

<body>
    <a href="homefront.php" class="button">Return Home</a>
    <div class="calculator-container">
        <h2>Calculatrice Scientifique</h2>
        <div class="calculator">
            <input type="text" id="display" placeholder="0" readonly>

            <div class="keys">
                <button onclick="appendValue('(')">(</button>
                <button onclick="appendValue(')')">)</button>
                <button onclick="clearDisplay()">C</button>
                <button onclick="deleteLast()">⌫</button>

                <button onclick="appendValue('7')">7</button>
                <button onclick="appendValue('8')">8</button>
                <button onclick="appendValue('9')">9</button>
                <button onclick="appendValue('/')">÷</button>

                <button onclick="appendValue('4')">4</button>
                <button onclick="appendValue('5')">5</button>
                <button onclick="appendValue('6')">6</button>
                <button onclick="appendValue('*')">×</button>

                <button onclick="appendValue('1')">1</button>
                <button onclick="appendValue('2')">2</button>
                <button onclick="appendValue('3')">3</button>
                <button onclick="appendValue('-')">−</button>

                <button onclick="appendValue('0')">0</button>
                <button onclick="appendValue('.')">.</button>
                <button onclick="calculate()">=</button>
                <button onclick="appendValue('+')">+</button>

                <button onclick="appendValue('cos(')">cos</button>
                <button onclick="appendValue('sin(')">sin</button>
                <button onclick="appendValue('tan(')">tan</button>
                <button onclick="appendValue('ln(')">ln</button>

                <button onclick="appendValue('exp(')">exp</button>
                <button onclick="appendValue('sqrt(')">√</button>
                <button onclick="appendValue('Math.PI')">π</button>
                <button onclick="appendValue('Math.E')">e</button>
            </div>
        </div>
    </div>

    <script>
        // Ajouter une valeur à l'affichage
        function appendValue(value) {
            document.getElementById('display').value += value;
        }

        // Effacer l'affichage
        function clearDisplay() {
            document.getElementById('display').value = '';
        }

        // Supprimer le dernier caractère
        function deleteLast() {
            const display = document.getElementById('display');
            display.value = display.value.slice(0, -1);
        }

        // Calculer le résultat
        function calculate() {
            try {
                const result = eval(document.getElementById('display').value
                    .replace('cos', 'Math.cos')
                    .replace('sin', 'Math.sin')
                    .replace('tan', 'Math.tan')
                    .replace('ln', 'Math.log')
                    .replace('exp', 'Math.exp')
                    .replace('sqrt', 'Math.sqrt')
                );
                document.getElementById('display').value = result;
            } catch (error) {
                alert('Expression invalide !');
            }
        }
    </script>
</body>
</html>