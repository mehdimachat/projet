<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calcul Rapide</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(to bottom, #4facfe, #00f2fe);
      color: #333;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    #game-container {
      text-align: center;
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      width: 400px;
    }
    #question {
      font-size: 24px;
      margin: 20px 0;
    }
    #answer {
      padding: 10px;
      font-size: 16px;
      width: calc(100% - 24px);
      margin-bottom: 20px;
      border: 2px solid #4facfe;
      border-radius: 5px;
    }
    #submit {
      padding: 10px 20px;
      font-size: 16px;
      background: #4facfe;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    #submit:hover {
      background: #3578e5;
    }
    #score, #timer {
      font-size: 18px;
      margin: 10px 0;
    }
    .button {
  position: relative;
  top: -300px; /* Décalage vers le bas */
  left: -200px; /* Décalage vers la droite */
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
<a href="homefront.php" class="button">Return Home</a>
  <div id="game-container">
    <h1>Calcul Rapide</h1>
    <div id="timer">Temps restant : <span id="time">30</span> secondes</div>
    <div id="score">Score : <span id="current-score">0</span></div>
    <div id="question"></div>
    <input type="text" id="answer" placeholder="Votre réponse" />
    <button id="submit">Valider</button>
  </div>
   
  <script>
    // Variables globales
    let timer = 30;
    let score = 0;
    let currentQuestion = {};

    const timeDisplay = document.getElementById("time");
    const scoreDisplay = document.getElementById("current-score");
    const questionDisplay = document.getElementById("question");
    const answerInput = document.getElementById("answer");
    const submitButton = document.getElementById("submit");

    // Fonction pour générer une nouvelle question
    function generateQuestion() {
      const num1 = Math.floor(Math.random() * 20) + 1;
      const num2 = Math.floor(Math.random() * 20) + 1;
      const operators = ["+", "-", "*"];
      const operator = operators[Math.floor(Math.random() * operators.length)];

      let question = `${num1} ${operator} ${num2}`;
      let answer = eval(question);

      currentQuestion = { question, answer };
      questionDisplay.textContent = `Question : ${question}`;
    }

    // Démarrer le jeu
    function startGame() {
      generateQuestion();

      const countdown = setInterval(() => {
        timer--;
        timeDisplay.textContent = timer;

        if (timer <= 0) {
          clearInterval(countdown);
          endGame();
        }
      }, 1000);
    }

    // Vérifier la réponse
    submitButton.addEventListener("click", () => {
      const userAnswer = parseInt(answerInput.value);

      if (userAnswer === currentQuestion.answer) {
        score++;
        scoreDisplay.textContent = score;
        generateQuestion();
      } else {
        alert("Mauvaise réponse !");
      }

      answerInput.value = "";
    });

    // Fin du jeu
    function endGame() {
      questionDisplay.textContent = "Temps écoulé !";
      submitButton.disabled = true;
      answerInput.disabled = true;
      alert(`Jeu terminé ! Votre score final est de : ${score}`);
    }

    // Initialisation
    startGame();
  </script>
</body>
</html>