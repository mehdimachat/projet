<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloc-notes</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e6f7ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 450px;
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        textarea {
            width: 100%;
            height: 200px;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            resize: vertical;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 12px 25px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
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
</head>
<body>
<a href="homefront.php" class="button">Return Home</a>
    <div class="container">
        <h1>Bloc-notes</h1>
        <textarea id="note" placeholder="Écrivez votre texte ici..."></textarea>
        <input type="text" id="nomFichier" placeholder="Nom du fichier (ex. note.txt)">
        <br>
        <button onclick="enregistrerNote()">Enregistrer</button>
    </div>

    <script>
        function enregistrerNote() {
            const contenu = document.getElementById('note').value;
            const nomFichier = document.getElementById('nomFichier').value || 'note.txt';

            if (!contenu.trim()) {
                alert("Veuillez écrire quelque chose avant d'enregistrer.");
                return;
            }

            // Création du fichier blob
            const blob = new Blob([contenu], { type: 'text/plain' });

            // Création de l'élément de téléchargement temporaire
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = nomFichier;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        }
    </script>
</body>
</html>