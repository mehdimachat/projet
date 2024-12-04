<?php
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header("Location: login.php"); // Redirect to login if not an admin
    exit;
}

require_once '../Controller/UserC.php';

$userC = new UserC();
$users = $userC->listUser();
?>
<?php
require_once '../Controller/NotifC.php';

$notifController = new NotifC();
$notifs = $notifController->listNotif();
?>
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
table {
    width: 5%; /* Prend toute la largeur */
    border-collapse: collapse; /* Supprime les espaces entre les bordures */
    margin: 10px 350px; /* Espacement vertical */
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
.button {
  position: relative;
  top: 10px; /* Décalage vers le bas */
  left: 200px; /* Décalage vers la droite */
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
            <li><a href="#1"><i class="fa fa-home"></i> <em>User</em></a></li>
            <li><a href="#2"><i class="fa fa-user"></i> <em>Notif</em></a></li>
            <li><a href="#3"><i class="fa fa-pencil"></i> <em>Entries</em></a></li>
            <li><a href="#4"><i class="fa fa-image"></i> <em>Work</em></a></li>
            <li><a href="#5"><i class="fa fa-envelope"></i> <em>Contact</em></a></li>
        </ul>
    </nav>
    
    <li><a href="addUser.php"><i class="fa fa-home"></i> <em>Home</em></a></li>

        <div class="slides">
          <div class="slide" id="1">
          <a href="logoutlist.php" class="button">Déconnexion</a>
          <a href="recherche.php" class="button">Recherche User</a>
          <a href="recherche.php" class="button">Trie/Recherche List</a>
          <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>CIN</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['id']); ?></td>
                    <td><?php echo htmlspecialchars($user['nom']); ?></td>
                    <td><?php echo htmlspecialchars($user['prenom']); ?></td>
                    <td><?php echo htmlspecialchars($user['cin']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['role']); ?></td>
                    <td><?php echo htmlspecialchars($user['telephone']); ?></td>
                    <td><?php echo htmlspecialchars($user['adresse']); ?></td>
                    <td>
                        <!-- Lien pour supprimer l'utilisateur -->
                        <a href="deleteUser.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">Supprimer</a>

                        <!-- Bouton pour modifier l'utilisateur -->
                        <a href="updateUser.php?id=<?php echo $user['id']; ?>"><button>Modifier</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
              
          </div>
          <div class="slide" id="2">
            <div >
                <div class="container-fluid">
                    <div class="col-md-6">
                    <table>
    <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Contenu</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($notifs as $notif): ?>
        <tr>
            <td><?php echo $notif['id']; ?></td>
            <td><?php echo $notif['titre']; ?></td>
            <td><?php echo $notif['contenu']; ?></td>
            <td>
                
                <a href="deleteNotif.php?idn=<?php echo $notif['idn']; ?>" onclick="return confirm('Voulez-vous vraiment supprimer cette notif ?');">Supprimer</a>

                        <!-- Bouton pour modifier l'utilisateur -->
                <a href="updateNotif.php?idn=<?php echo $notif['idn']; ?>"><button>Modifier</button></a>
               
            </td>
        </tr>
    <?php endforeach; ?>
</table>
 
<form action="addNotif.php" method="POST">
    <div>
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" placeholder="titre"required>
        <span id="titreError" style="color: red;"></span>
    </div>
    <div>
        <label for="contenu">Contenu :</label>
        <textarea id="contenu" name="contenu" placeholder="contenu" required></textarea>
        <span id="contenuError" style="color: red;"></span>
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
        <span id="idError" style="color: red;"></span>
    </div>
    <div>
        <button type="submit">Ajouter</button>
    </div>
</form>

<script>
document.getElementById('titre').addEventListener('keyup', function() {
    const titre = this.value;
    const titreError = document.getElementById('titreError');

    if (titre.length < 3) {
        titreError.textContent = "Le titre doit contenir au moins 3 caractères.";
        titreError.style.color = 'red';
    } else {
        titreError.textContent = "Correct";
        titreError.style.color = 'green';
    }
});

document.getElementById('contenu').addEventListener('keyup', function() {
    const contenu = this.value;
    const contenuError = document.getElementById('contenuError');

    if (contenu.length < 10) {
        contenuError.textContent = "Le contenu doit contenir au moins 10 caractères.";
        contenuError.style.color = 'red';
    } else {
        contenuError.textContent = "Correct";
        contenuError.style.color = 'green';
    }
});

document.getElementById('id').addEventListener('change', function() {
    const id = this.value;
    const idError = document.getElementById('idError');

    if (!id) {
        idError.textContent = "Veuillez sélectionner un utilisateur.";
        idError.style.color = 'red';
    } else {
        idError.textContent = "Correct";
        idError.style.color = 'green';
    }
});
</script>
<style>
            /* Style du formulaire */
            form {
    position: relative;
    top: -250px; /* Décalage vers le bas */
    left: 900px; /* Décalage vers la droite */
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
            color: red;
            margin-left: 10px;
        }
        .success-message {
            font-size: 0.9em;
            color: green;
            margin-left: 10px;
          
        }
    

          </style>
        </div>
        <div>

                    </div>

                </div>
            </div>
          </div>
          <div class="slide" id="3">
            <div class="content third-content">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="first-section">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="left-content">
                                                <h2>Quisque commodo quam</h2>
                                                <p>Vestibulum augue ex, finibus sit amet nisi id, maximus ultrices ipsum. Maecenas rhoncus nibh in mauris lobortis, a maximus diam faucibus. In et eros urna. Suspendisse potenti. Pellentesque commodo, neque nec molestie tempus, purus ante feugiat augue.</p>
                                                <div class="main-btn"><a href="#4">Continue Reading</a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="right-image">
                                                <img src="imgbac/first_service.jpg" alt="first service">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="second-section">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="left-image">
                                                <img src="imgbac/second_service.jpg" alt="second service">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="right-content">
                                                <h2>Maecenas eu purus eu sapien</h2>
                                                <p>Sed vitae felis in lorem mollis mollis eget in leo. Donec commodo, ex nec rutrum venenatis, nisi nisl malesuada magna, sed semper ipsum enim a ipsum. Aenean in ante vel mi molestie bibendum. Quisque sit amet lacus in diam pretium faucibus. Cras vel justo lorem.</p>
                                                <div class="main-btn"><a href="#4">Continue Reading</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="slide" id="4">
            <div class="content fourth-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="item">
                                <div class="thumb">
                                    <a href="imgbac/first_big_item.jpg" data-lightbox="image-1"><div class="hover-effect">
                                        <div class="hover-content">
                                            <h2>Number One</h2>
                                            <p>Quisque sit amet lacus in diam pretium faucibus. Cras vel justo lorem.</p>
                                        </div>
                                    </div></a>
                                    <div class="image">
                                        <img src="imgbac/first_item.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="item">
                                <div class="thumb">
                                    <a href="imgbac/second_big_item.jpg" data-lightbox="image-1"><div class="hover-effect">
                                        <div class="hover-content">
                                            <h2>Number Two</h2>
                                            <p>Donec eget dictum tellus. Curabitur a interdum diam. Nulla vestibulum porttitor porta.</p>
                                        </div>
                                    </div></a>
                                    <div class="image">
                                        <img src="imgbac/second_item.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="item">
                                <div class="thumb">
                                    <a href="imgbac/third_big_item.jpg" data-lightbox="image-1"><div class="hover-effect">
                                        <div class="hover-content">
                                            <h2>Number Three</h2>
                                            <p>Cras varius dolor et augue fringilla, eu commodo sapien iaculis.</p>
                                        </div>
                                    </div></a>
                                    <div class="image">
                                        <img src="imgbac/third_item.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="item">
                                <div class="thumb">
                                    <a href="imgbac/fourth_big_item.jpg" data-lightbox="image-1"><div class="hover-effect">
                                        <div class="hover-content">
                                            <h2>Number Four</h2>
                                            <p>Vestibulum augue ex, finibus sit amet nisi id, maximus ultrices ipsum.</p>
                                        </div>
                                    </div></a>
                                    <div class="image">
                                        <img src="imgbac/fourth_item.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="item">
                                <div class="thumb">
                                    <a href="imgbac/fifth_big_item.jpg" data-lightbox="image-1"><div class="hover-effect">
                                        <div class="hover-content">
                                            <h2>Fifth Item</h2>
                                            <p>Donec commodo, ex nec rutrum venenatis, nisi nisl malesuada magna.</p>
                                        </div>
                                    </div></a>
                                    <div class="image">
                                        <img src="imgbac/fifth_item.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="item">
                                <div class="thumb">
                                    <a href="imgbac/sixth_big_item.jpg" data-lightbox="image-1"><div class="hover-effect">
                                        <div class="hover-content">
                                            <h2>Sixth Item</h2>
                                            <p>Maecenas dapibus neque sed nisl consectetur, id semper nisi egestas.</p>
                                        </div>
                                    </div></a>
                                    <div class="image">
                                        <img src="imgbac/sixth_item.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="item">
                                <div class="thumb">
                                    <a href="imgbac/seventh_big_item.jpg" data-lightbox="image-1"><div class="hover-effect">
                                        <div class="hover-content">
                                            <h2>Number Seven</h2>
                                            <p>Etiam aliquet, est id varius fringilla, eros libero pellentesque lectus.</p>
                                        </div>
                                    </div></a>
                                    <div class="image">
                                        <img src="imgbac/seventh_item.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="item">
                                <div class="thumb">
                                    <a href="imgbac/eight_big_item.jpg" data-lightbox="image-1"><div class="hover-effect">
                                        <div class="hover-content">
                                            <h2>Number Eight</h2>
                                            <p>Vestibulum augue ex, finibus sit amet nisi id, maximus ultrices ipsum.</p>
                                        </div>
                                    </div></a>
                                    <div class="image">
                                        <img src="imgbac/eight_item.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="item">
                                <div class="thumb">
                                    <a href="imgbac/ninth_big_item.jpg" data-lightbox="image-1"><div class="hover-effect">
                                        <div class="hover-content">
                                            <h2>Number Nine</h2>
                                            <p>Orci varius natoque penatibus et magnis dis parturient montes.</p>
                                        </div>
                                    </div></a>
                                    <div class="image">
                                        <img src="imgbac/ninth_item.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="item">
                                <div class="thumb">
                                    <a href="imgbac/fifth_big_item.jpg" data-lightbox="image-1"><div class="hover-effect">
                                        <div class="hover-content">
                                            <h2>Number Ten</h2>
                                            <p>Vestibulum augue ex, finibus sit amet nisi id, maximus ultrices ipsum.</p>
                                        </div>
                                    </div></a>
                                    <div class="image">
                                        <img src="imgbac/fifth_item.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="item">
                                <div class="thumb">
                                    <a href="imgbac/first_big_item.jpg" data-lightbox="image-1"><div class="hover-effect">
                                        <div class="hover-content">
                                            <h2>Eleventh Item</h2>
                                            <p>Cras varius dolor et augue fringilla, eu commodo sapien iaculis.</p>
                                        </div>
                                    </div></a>
                                    <div class="image">
                                        <img src="imgbac/first_item.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="item">
                                <div class="thumb">
                                    <a href="imgbac/second_big_item.jpg" data-lightbox="image-1"><div class="hover-effect">
                                        <div class="hover-content">
                                            <h2>Twelvth Item</h2>
                                            <p>Etiam tincidunt magna ex, sit amet lobortis felis bibendum id.</p>
                                        </div>
                                    </div></a>
                                    <div class="image">
                                        <img src="imgbac/second_item.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="slide" id="5">
            <div class="content fifth-content">
                <div class="container-fluid">
                    <div class="col-md-6">
                        <div id="map">
    <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
	-->
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3647.3030413476204!2d100.5641230193719!3d13.757206847615207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf51ce6427b7918fc!2sG+Tower!5e0!3m2!1sen!2sth!4v1510722015945" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form id="contact" action="" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                  <fieldset>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Your email..." required="">
                                  </fieldset>
                                </div>
                                 <div class="col-md-12">
                                  <fieldset>
                                    <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject..." required="">
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required=""></textarea>
                                  </fieldset>
                                </div>
                                <div class="col-md-12">
                                  <fieldset>
                                    <button type="submit" id="form-submit" class="btn">Send Now</button>
                                  </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
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
