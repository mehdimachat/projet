<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Tunisie</title>
  <style>
 body {
      font-family: 'Arial', sans-serif;
      background: #e0f7ff; /* Bleu clair */
      color: #003366; /* Bleu foncé */
      text-align: center;
      padding: 0;
      margin: 0;
    }

    h1 {
      margin-top: 20px;
      font-size: 2.5rem;
      color: #003366;
    }

    .quiz-container {
      background: #ffffff; /* Blanc */
      color: #003366; /* Bleu foncé */
      padding: 20px;
      margin: 20px auto;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      max-width: 600px;
    }

    .question {
      font-size: 1.5rem;
      margin-bottom: 20px;
    }

    .choices {
      list-style: none;
      padding: 0;
    }

    .choices li {
      margin: 10px 0;
    }

    .choice-btn {
      width: 100%;
      padding: 12px;
      font-size: 1rem;
      border: 2px solid #003366; /* Bleu foncé */
      border-radius: 8px;
      background: #e0f7ff; /* Bleu clair */
      color: #003366; /* Texte bleu foncé */
      cursor: pointer;
      transition: background 0.3s, color 0.3s;
    }

    .choice-btn:hover {
      background: #003366; /* Bleu foncé */
      color: #ffffff; /* Texte blanc */
    }

    .score {
      font-size: 1.5rem;
      margin-top: 20px;
      color: #003366;
    }

    .restart-btn {
      margin-top: 20px;
      padding: 12px 20px;
      font-size: 1rem;
      background: #003366; /* Bleu foncé */
      color: #ffffff; /* Blanc */
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s, color 0.3s;
    }

    .restart-btn:hover {
      background: #002244; /* Bleu encore plus foncé */
    }
  </style>
</head>
<body>
  <h1>Quiz sur la Tunisie</h1>
  <div class="quiz-container">
    <div class="question">Chargement de la question...</div>
    <ul class="choices"></ul>
    <div class="score"></div>
    <button class="restart-btn" style="display: none;">Recommencer</button>
  </div>

  <script>
    const allQuestions = [
      { question: "Quelle est la capitale de la Tunisie ?", choices: ["Tunis", "Sousse", "Sfax", "Bizerte"], correct: 0 },
      { question: "En quelle année la Tunisie a-t-elle obtenu son indépendance ?", choices: ["1952", "1956", "1960", "1948"], correct: 1 },
      { question: "Quelle est la monnaie officielle de la Tunisie ?", choices: ["Euro", "Dinar tunisien", "Dollar", "Franc tunisien"], correct: 1 },
      { question: "Quel célèbre site archéologique se trouve en Tunisie ?", choices: ["Carthage", "Pompéi", "Machu Picchu", "Angkor"], correct: 0 },
      { question: "Qui était Habib Bourguiba ?", choices: ["Un poète célèbre", "Le premier président de la Tunisie", "Un général romain", "Un acteur connu"], correct: 1 },
      { question: "Quel est le plat traditionnel tunisien ?", choices: ["Couscous", "Pizza", "Paella", "Sushi"], correct: 0 },
      { question: "Combien de gouvernorats compte la Tunisie ?", choices: ["18", "20", "24", "30"], correct: 2 },
      { question: "Quelle est la langue officielle de la Tunisie ?", choices: ["Français", "Arabe", "Anglais", "Espagnol"], correct: 1 },
      { question: "Quel est le point culminant de la Tunisie ?", choices: ["Mont Zaghouan", "Djebel Chambi", "Mont Atlas", "Djebel Ressas"], correct: 1 },
      { question: "Quelle mer borde la Tunisie ?", choices: ["Mer Rouge", "Mer Méditerranée", "Océan Atlantique", "Mer Noire"], correct: 1 },
    ];

    const NUM_QUESTIONS = 5;
    let selectedQuestions = [];
    let currentQuestionIndex = 0;
    let score = 0;

    const questionEl = document.querySelector(".question");
    const choicesEl = document.querySelector(".choices");
    const scoreEl = document.querySelector(".score");
    const restartBtn = document.querySelector(".restart-btn");

    function getRandomQuestions() {
      const shuffled = allQuestions.sort(() => Math.random() - 0.5);
      return shuffled.slice(0, NUM_QUESTIONS);
    }

    function loadQuestion() {
      const currentQuestion = selectedQuestions[currentQuestionIndex];
      questionEl.textContent = currentQuestion.question;

      choicesEl.innerHTML = "";
      currentQuestion.choices.forEach((choice, index) => {
        const button = document.createElement("button");
        button.classList.add("choice-btn");
        button.textContent = choice;
        button.addEventListener("click", () => checkAnswer(index));
        const li = document.createElement("li");
        li.appendChild(button);
        choicesEl.appendChild(li);
      });
    }

    function checkAnswer(selectedIndex) {
      const currentQuestion = selectedQuestions[currentQuestionIndex];
      if (selectedIndex === currentQuestion.correct) {
        score++;
      }
      currentQuestionIndex++;
      if (currentQuestionIndex < selectedQuestions.length) {
        loadQuestion();
      } else {
        showResults();
      }
    }

    function showResults() {
      questionEl.textContent = "Quiz terminé !";
      choicesEl.innerHTML = "";
      scoreEl.textContent = `Votre score : ${score} / ${selectedQuestions.length}`;
      restartBtn.style.display = "inline-block";
    }

    restartBtn.addEventListener("click", () => {
      currentQuestionIndex = 0;
      score = 0;
      scoreEl.textContent = "";
      restartBtn.style.display = "none";
      selectedQuestions = getRandomQuestions();
      loadQuestion();
    });

    // Initialisation du quiz
    selectedQuestions = getRandomQuestions();
    loadQuestion();
  </script>
</body>
</html>
