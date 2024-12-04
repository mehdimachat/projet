<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jeu de Mémoire</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      background: linear-gradient(to bottom right, #6a11cb, #2575fc);
      min-height: 100vh;
      color: #fff;
    }

    h1 {
      font-size: 3rem;
      text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.4);
      margin-bottom: 20px;
    }

    #game-container {
      display: grid;
      grid-template-columns: repeat(4, 120px);
      gap: 15px;
      justify-content: center;
    }

    .card {
      width: 120px;
      height: 120px;
      background: linear-gradient(to bottom, #ff7eb3, #ff758c);
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 15px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
      cursor: pointer;
      transform: scale(1);
      transition: transform 0.3s, background 0.3s;
      font-size: 2rem;
      color: transparent;
    }

    .card:hover {
      transform: scale(1.05);
    }

    .card.revealed {
      background: #ffffff;
      color: #ff758c;
      transform: scale(1);
      cursor: default;
    }

    .card.matched {
      background: #4caf50;
      color: #ffffff;
      transform: scale(1);
      cursor: default;
    }

    .footer {
      margin-top: 20px;
      font-size: 1.2rem;
      text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.3);
    }
  </style>
</head>
<body>
<a href="homefront.php" class="button">Return Home</a>
  <h1>Jeu de Mémoire</h1>
  <div id="game-container"></div>
  <div class="footer">Trouvez toutes les paires pour gagner !</div>

  <script>
    const icons = ["🍎", "🍌", "🍇", "🍒", "🥝", "🍍", "🍉", "🍓"];
    const cards = [...icons, ...icons]; // Paires d'icônes
    const gameContainer = document.getElementById("game-container");

    let firstCard = null;
    let secondCard = null;
    let lockBoard = false;

    // Mélanger les cartes
    function shuffle(array) {
      for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
      }
    }
    shuffle(cards);

    // Créer et afficher les cartes
    cards.forEach((icon) => {
      const card = document.createElement("div");
      card.classList.add("card");
      card.dataset.icon = icon;
      card.textContent = icon;

      card.addEventListener("click", () => {
        if (lockBoard || card === firstCard || card.classList.contains("matched")) return;

        card.classList.add("revealed");

        if (!firstCard) {
          firstCard = card;
          return;
        }

        secondCard = card;
        checkForMatch();
      });

      gameContainer.appendChild(card);
    });

    // Vérification des paires
    function checkForMatch() {
      if (firstCard.dataset.icon === secondCard.dataset.icon) {
        firstCard.classList.add("matched");
        secondCard.classList.add("matched");
        resetTurn();
      } else {
        lockBoard = true;
        setTimeout(() => {
          firstCard.classList.remove("revealed");
          secondCard.classList.remove("revealed");
          resetTurn();
        }, 1000);
      }
    }

    // Réinitialisation après chaque tour
    function resetTurn() {
      firstCard = null;
      secondCard = null;
      lockBoard = false;

      // Vérifier si toutes les cartes sont appariées
      if (document.querySelectorAll(".card.matched").length === cards.length) {
        setTimeout(() => {
          alert("Félicitations ! Vous avez gagné !");
          resetGame();
        }, 500);
      }
    }

    // Réinitialiser le jeu
    function resetGame() {
      shuffle(cards);
      const cardElements = document.querySelectorAll(".card");
      cardElements.forEach((card, index) => {
        card.textContent = cards[index];
        card.dataset.icon = cards[index];
        card.classList.remove("revealed", "matched");
      });
    }
  </script>
</body>
</html>