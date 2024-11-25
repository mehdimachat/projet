<?php
require_once '../Controller/UserC.php';

$userController = new UserC();

// Vérifier que l'identifiant est fourni dans l'URL
if (isset($_GET['id'])) {
    // Assurez-vous que l'ID est un entier
    $id = $_GET['id'];
    if (!is_numeric($id)) {
        echo "ID invalide";
        exit;
    }
    $id = (int) $id;  // Convertir en entier
    $user = $userController->getUserById($id); // Récupérer l'utilisateur par son ID
    if (!$user) {
        echo "Utilisateur non trouvé";
        exit;
    }
} else {
    echo "ID non fourni";
    //exit;
}

// Si le formulaire est soumis, traiter les modifications
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assurer la validation des données soumises
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $cin = $_POST['cin'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $role = $_POST['role'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];

    // Vérification de la validité des données
    if (empty($nom) || empty($prenom) || empty($cin) || empty($email) || empty($role) || empty($telephone) || empty($adresse)) {
        echo "Tous les champs sont requis.";
        exit;
    }

    // Si le mot de passe est vide, ne pas changer le mot de passe
    if (empty($mot_de_passe)) {
        $mot_de_passe = $user['mot_de_passe']; // Garder l'ancien mot de passe
    }

    // Créer une instance de User avec les nouvelles valeurs
    $updatedUser = new User(
        $user['id'], // Garder l'ID actuel
        $nom, 
        $prenom, 
        $cin, 
        $email, 
        $mot_de_passe, 
        $role, 
        $telephone, 
        $adresse
    );

    // Appeler la fonction de mise à jour dans le contrôleur
    $userController->updateUser($id, $updatedUser);

    // Rediriger vers la liste des utilisateurs après modification
    header('Location: listUser.php');
    exit; // Toujours utiliser exit après header pour stopper l'exécution
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
form {
    position: relative;
    top: 2px; /* Décalage vers le bas */
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
            <li><a href="#1"><i class="fa fa-home"></i> <em>Home</em></a></li>
            <li><a href="#2"><i class="fa fa-user"></i> <em>About</em></a></li>
            <li><a href="#3"><i class="fa fa-pencil"></i> <em>Entries</em></a></li>
            <li><a href="#4"><i class="fa fa-image"></i> <em>Work</em></a></li>
            <li><a href="#5"><i class="fa fa-envelope"></i> <em>Contact</em></a></li>
        </ul>
    </nav>
    

        <div class="slides">
          <div class="slide" id="1">
          <form action="" method="POST">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" value="<?= htmlspecialchars($user['nom'], ENT_QUOTES) ?>" required minlength="3">
    <br>

    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" id="prenom" value="<?= htmlspecialchars($user['prenom'], ENT_QUOTES) ?>" required minlength="3">
    <br>

    <label for="cin">CIN :</label>
    <input type="text" name="cin" id="cin" value="<?= htmlspecialchars($user['cin'], ENT_QUOTES) ?>" required minlength="8" maxlength="8" pattern="\d{8}">
    <br>

    <label for="email">Email :</label>
    <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email'], ENT_QUOTES) ?>" required>
    <br>

    <label for="mot_de_passe">Mot de passe :</label>
    <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Laisser vide pour ne pas modifier" minlength="6">
    <br>

    <label for="role">Rôle :</label>
    <select name="role" id="role" required>
        <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Administrateur</option>
        <option value="Parent" <?= $user['role'] === 'Parent' ? 'selected' : '' ?>>Parent</option>
        <option value="Etudiant" <?= $user['role'] === 'Etudiant' ? 'selected' : '' ?>>Etudiant</option>
        <option value="Enseignant" <?= $user['role'] === 'Enseignant' ? 'selected' : '' ?>>Enseignant</option>
    </select>
    <br>

    <label for="telephone">Téléphone :</label>
    <input type="tel" name="telephone" id="telephone" value="<?= htmlspecialchars($user['telephone'], ENT_QUOTES) ?>" required minlength="8" maxlength="15" pattern="\d{8,15}">
    <br>

    <label for="adresse">Adresse :</label>
    <input type="text" name="adresse" id="adresse" value="<?= htmlspecialchars($user['adresse'], ENT_QUOTES) ?>" required>
    <br>

    <button type="submit">Mettre à jour l'utilisateur</button>
</form>
              
          </div>
          <div class="slide" id="2">
            <div class="content second-content">
                <div class="container-fluid">
                    <div class="col-md-6">
                        <div class="left-content">
                            <h2>About Us</h2>
                            <p>Please tell your friends about templatemo website. A variety of free CSS templates are available for immediate downloads.</p> 
                            <p>Phasellus vitae faucibus orci. Etiam eleifend orci sed faucibus semper. Cras varius dolor et augue fringilla, eu commodo sapien iaculis. Donec eget dictum tellus. <a href="#">Curabitur</a> a interdum diam. Nulla vestibulum porttitor porta.</p>
                            <p>Nulla vitae interdum libero, vel posuere ipsum. Phasellus interdum est et dapibus tempus. Vestibulum malesuada lorem condimentum mauris ornare dapibus. Curabitur tempor ligula et <a href="#">placerat</a> molestie.</p>
                            <p>Aliquam efficitur eu purus in interdum. <a href="#">Etiam tincidunt</a> magna ex, sit amet lobortis felis bibendum id. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                          <div class="main-btn"><a href="#3">Read More</a></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="right-image">
                          <img src="imgbac/about_image.jpg" alt="">
                      </div>
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

