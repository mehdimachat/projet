<?php
// Inclure le contrôleur pour la recherche
require_once '../Controller/UserC.php';

// Initialisation de la variable $user qui contiendra les résultats de la recherche
$user = null;

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nom']) && isset($_POST['prenom'])) {
    // Récupérer les valeurs du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    
    // Instancier le contrôleur UserC
    $userC = new UserC();

    // Chercher l'utilisateur dans la base de données par nom et prénom
    $user = $userC->getUserByName($nom, $prenom);
}
?>
<?php
require_once '../Controller/UserC.php'; // Inclure le contrôleur
$userC = new UserC(); // Instanciation du contrôleur

// Déterminer les critères de tri en fonction des boutons cliqués
$column = 'id'; // Par défaut, trier par ID
$order = 'ASC'; // Par défaut, ordre croissant

if (isset($_GET['column']) && isset($_GET['order'])) {
    $allowedColumns = ['id', 'nom', 'email']; // Colonnes autorisées
    $allowedOrders = ['ASC', 'DESC']; // Ordres autorisés

    // Valider les paramètres de tri
    if (in_array($_GET['column'], $allowedColumns) && in_array($_GET['order'], $allowedOrders)) {
        $column = $_GET['column'];
        $order = $_GET['order'];
    }
}

// Obtenir la liste des utilisateurs triés
$users = $userC->listUserBy($column, $order);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Moonlight CSS Website Template</title>
<!-- 
Moonlight Template 
https://templatemo.com/tm-512-moonlight
-->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="cssbac/bootstrap.min.css">
        <link rel="stylesheet" href="cssbac/bootstrap-theme.min.css">
        <link rel="stylesheet" href="cssbac/fontAwesome.css">
        <link rel="stylesheet" href="cssbac/light-box.css">
        <link rel="stylesheet" href="cssbac/templatemo-main.css">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <script src="jsbac/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <style>
          /* Style général du tableau */
          form {
    position: relative;
    top: 100px; /* Décalage vers le bas */
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
    width: 95%; /* Prend toute la largeur */
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
            color: red;
            margin-left: 10px;
        }
        .success-message {
            font-size: 0.9em;
            color: green;
            margin-left: 10px;
          
        }
        .form2 {
    position: relative;
    top: 0px; /* Décalage vers le bas */
    left: 300px; /* Décalage vers la droite */
    background-color: grey;
    padding: 20px 30px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Légère ombre pour un effet d'élévation */
    width: 400px;
}

/* Style des étiquettes */
.form2 label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #0060f0f2;
}

/* Style des champs de saisie, des listes déroulantes et du bouton */
.form2 input,
.form2 select,
.form2 button {
    width: 95%; /* Prend toute la largeur */
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

/* Effets de focus */
.form2 input:focus,
.form2 select:focus {
    border-color: #0060f0f2;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 96, 240, 0.5);
}

/* Style du bouton */
.form2 button {
    background-color: #0060f0f2;
    color: white;
    font-weight: bold;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Effet de survol du bouton */
.form2 button:hover {
    background-color: #0050d1;
}


        .button1 {
  position: relative;
  top: -200px; /* Décalage vers le bas */
  left: 100px; /* Décalage vers la droite */
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

.button1:hover {
  background-color: #0056b3; /* Couleur au survol */
  border-color: #004080;    /* Bordure plus visible au survol */
  cursor: pointer;          /* Curseur en forme de main */
}.button2 {
  position: relative;
  top: 150px; /* Décalage vers le bas */
  left: 700px; /* Décalage vers la droite */
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
table {
    width: 5%; /* Prend toute la largeur */
    border-collapse: collapse; /* Supprime les espaces entre les bordures */
    margin: -300px 750px; /* Espacement vertical */
    font-size: 16px; /* Taille de la police */
    font-family: Arial, sans-serif; /* Police du tableau */
    text-align: left; /* Aligne le texte à gauche */
}

/* Bordures du tableau */
table th, table td {
    border: 1px solid #ddd; /* Bordures grises légères */
    padding: 10px; /* Espacement intérieur */
}

/* En-tête du tableau */
thead tr {
    background-color: #0d6efd; /* Bleu pour l'en-tête */
    color: white; /* Texte en blanc */
    text-transform: uppercase; /* Texte en majuscules */
    letter-spacing: 1px; /* Espacement entre les lettres */
}

/* Alternance de couleur des lignes */
tbody tr:nth-child(even) {
    background-color: #f2f2f2; /* Gris clair pour les lignes paires */
}

tbody tr:nth-child(odd) {
    background-color: white; /* Blanc pour les lignes impaires */
}

/* Survol des lignes */
tbody tr:hover {
    background-color: #cce5ff; /* Bleu clair au survol */
}

/* Liens dans la colonne Actions */
tbody a {
    color: #0d6efd; /* Bleu pour les liens */
    text-decoration: none; /* Supprime le soulignement */
    font-weight: bold; /* Texte gras */
}

tbody a:hover {
    text-decoration: underline; /* Soulignement au survol */
}

/* Bouton Modifier */
tbody button {
    background-color: #0d6efd; /* Fond bleu */
    color: white; /* Texte blanc */
    border: none; /* Pas de bordure */
    padding: 5px 10px; /* Espacement interne */
    border-radius: 5px; /* Coins arrondis */
    cursor: pointer; /* Curseur en forme de main */
}

tbody button:hover {
    background-color: #0a58ca; /* Bleu plus foncé au survol */
}
.table2 {
    width: 5%; /* Prend toute la largeur */
    border-collapse: collapse; /* Supprime les espaces entre les bordures */
    margin: 200px 400px; /* Espacement vertical */
    font-size: 16px; /* Taille de la police */
    font-family: Arial, sans-serif; /* Police du tableau */
    text-align: left; /* Aligne le texte à gauche */
}

/* Bordures du tableau */
.table2 th, .table2 td {
    border: 1px solid #ddd; /* Bordures grises légères */
    padding: 10px; /* Espacement intérieur */
}

/* En-tête du tableau */
thead tr {
    background-color: #0d6efd; /* Bleu pour l'en-tête */
    color: white; /* Texte en blanc */
    text-transform: uppercase; /* Texte en majuscules */
    letter-spacing: 1px; /* Espacement entre les lettres */
}

/* Alternance de couleur des lignes */
tbody tr:nth-child(even) {
    background-color: #f2f2f2; /* Gris clair pour les lignes paires */
}

tbody tr:nth-child(odd) {
    background-color: white; /* Blanc pour les lignes impaires */
}

/* Survol des lignes */
tbody tr:hover {
    background-color: #cce5ff; /* Bleu clair au survol */
}

/* Liens dans la colonne Actions */
tbody a {
    color: #0d6efd; /* Bleu pour les liens */
    text-decoration: none; /* Supprime le soulignement */
    font-weight: bold; /* Texte gras */
}

tbody a:hover {
    text-decoration: underline; /* Soulignement au survol */
}

/* Bouton Modifier */
tbody button {
    background-color: #0d6efd; /* Fond bleu */
    color: white; /* Texte blanc */
    border: none; /* Pas de bordure */
    padding: 5px 10px; /* Espacement interne */
    border-radius: 5px; /* Coins arrondis */
    cursor: pointer; /* Curseur en forme de main */
}

tbody button:hover {
    background-color: #0a58ca; /* Bleu plus foncé au survol */
}
 </style>
    </head>

<body>
    
    <div class="sequence">
  
      <div class="seq-preloader">
        <svg width="39" height="16" viewBox="0 0 39 16" xmlns="http://www.w3.org/2000/svg" class="seq-preload-indicator"><g fill="#F96D38"><path class="seq-preload-circle seq-preload-circle-1" d="M3.999 12.012c2.209 0 3.999-1.791 3.999-3.999s-1.79-3.999-3.999-3.999-3.999 1.791-3.999 3.999 1.79 3.999 3.999 3.999z"/><path class="seq-preload-circle seq-preload-circle-2" d="M15.996 13.468c3.018 0 5.465-2.447 5.465-5.466 0-3.018-2.447-5.465-5.465-5.465-3.019 0-5.466 2.447-5.466 5.465 0 3.019 2.447 5.466 5.466 5.466z"/><path class="seq-preload-circle seq-preload-circle-3" d="M31.322 15.334c4.049 0 7.332-3.282 7.332-7.332 0-4.049-3.282-7.332-7.332-7.332s-7.332 3.283-7.332 7.332c0 4.05 3.283 7.332 7.332 7.332z"/></g></svg>
      </div>
      
    </div>
    <nav>
        <div class="logo">
            <img src="imgbac/logo.png" alt="">
        </div>
        <div class="mini-logo">
            <img src="imgbac/mini_logo.png" alt="">
        </div>
        <ul>
            <!-- Change the href of Home to About.html -->
            <li><a href="#1"><i class="fa fa-home"></i> <em>Recherche</em></a></li>
            <li><a href="#2"><i class="fa fa-user"></i> <em>Trie</em></a></li>
            <li><a href="#3"> </a></li>
            <li><a href="#4"> </a></li>
            <li><a href="#5"></a></li>
        </ul>
    </nav>
    

        <div class="slides">
          <div class="slide" id="1">

         <!-- Formulaire de recherche -->
<form method="POST" action="recherche.php">
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="text" name="prenom" placeholder="Prénom" required>
    <button type="submit">Rechercher</button>
</form>
<a href="listUser.php" class="button1">return to list</a>

<!-- Affichage des résultats ou message d'erreur -->
<?php if ($user): ?>
    <table border="1" class="table2">
    <tr>
    
    <th>Détails de l'utilisateur</th>
    <th>Nom : <?= htmlspecialchars($user['nom']); ?></th>
    <th>Prénom : <?= htmlspecialchars($user['prenom']); ?></th>
    <th>Email : <?= htmlspecialchars($user['email']); ?></th>
    <th>Téléphone : <?= htmlspecialchars($user['telephone']); ?></th>
    <th>Adresse : <?= htmlspecialchars($user['adresse']); ?></th>
  
        </tr>
</table>
<?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
    <p>Aucun utilisateur trouvé avec ce nom et prénom.</p>
<?php endif; ?>
              
          </div>
          <div class="slide" id="2">
            <div >
                <div class="container-fluid">
                    <div class="col-md-6">
                    <p>44</p>
                    <form method="get" action="recherche.php#2" class="form2">
        <button type="submit" name="column" value="id">Trier par ID</button>
        <button type="submit" name="column" value="nom">Trier par Nom</button>
        <button type="submit" name="column" value="email">Trier par Email</button>
        <select name="order">
            <option value="ASC" <?php echo $order == 'ASC' ? 'selected' : ''; ?>>Ordre Croissant</option>
            <option value="DESC" <?php echo $order == 'DESC' ? 'selected' : ''; ?>>Ordre Décroissant</option>
        </select>
        <button type="submit">Appliquer</button>
    </form>

    <!-- Affichage de la liste -->
    <table border="1" class="table">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo htmlspecialchars($user['nom']); ?></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
                    </div>

                </div>
            </div>
          </div>

        <div class="footer">
          <div class="content">
              <p>Copyright &copy; 2020 Company Name . Template: <a rel="nofollow" href="https://templatemo.com/tm-512-moonlight">Moonlight</a></p>
          </div>
        </div>
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="jsbac/vendor/bootstrap.min.js"></script>
    
    <script src="jsbac/datepicker.js"></script>
    <script src="jsbac/plugins.js"></script>
    <script src="jsbac/main.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {

        

        // navigation click actions 
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');         
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 0;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }
    </script>
</body>
</html>
