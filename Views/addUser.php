<?php
require_once '../Controller/UserC.php';
// Vérifie si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $cin = $_POST['cin'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $role = $_POST['role'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];

    // Crée un objet User et initialise les valeurs
    $user = new User(null, $nom, $prenom, $cin, $email, $mot_de_passe, $role, $telephone, $adresse);

    // Appelle la fonction d'ajout
    $userC = new UserC();
    $userC->addUser($user);

    // Redirige vers la liste des offres
    header("Location: addUserconection.php"); // Remplacez 'listeOffres.php' par le nom correct de votre fichier de liste
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Sentra - Free Bootstrap Theme</title>
        
<!-- 

Sentra Template

https://templatemo.com/tm-518-sentra

-->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="cssf/bootstrap.min.css">
        <link rel="stylesheet" href="cssf/bootstrap-theme.min.css">
        <link rel="stylesheet" href="cssf/fontAwesome.css">
        <link rel="stylesheet" href="cssf/light-box.css">
        <link rel="stylesheet" href="cssf/owl-carousel.css">
        <link rel="stylesheet" href="cssf/templatemo-style.css">

        <link href="https://fontsf.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <script src="jsf/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <style>
            /* Style du formulaire */
        
        
.button {
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
              top: 10px; /* Décalage vers le bas */
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
                      margin-left: 10px;
                  }
          </style>
    </head>

<body>



        <header class="nav-down responsive-nav hidden-lg hidden-md">
            <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--/.navbar-header-->
            <div id="main-nav" class="collapse navbar-collapse">
                <nav>
                    <ul class="nav navbar-nav">
                        <li><a href="#top">Home</a></li>
                        <li><a href="#featured">Featured</a></li>
                        <li><a href="homefront.html">Return To Home</a></li>
                        <li><a href="About.html">Presentation</a></li>
                        <li><a href="#blog">Blog Entries</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="sidebar-navigation hidde-sm hidden-xs">
            <div class="logo">
                <a href="#">Sen<em>tra</em></a>
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="#top">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            S'inscrire
                        </a>
                    </li>
                    <li>
                        <a href="#featured">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Se Connecter
                        </a>
                    </li>
                    <li>
                        <a href="homefront.html">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Return To Home
                        </a>
                    </li>
                    <li>
                        <a href="About.html">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Presentation
                        </a>
                    </li>
                    <li>
                        <a href="#blog">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Blog Entires
                        </a>
                    </li>
                    <li>
                        <a href="#contact">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Contact Us
                        </a>
                    </li>
                </ul>
            </nav>
            <ul class="social-icons">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul>
        </div>

        <div class="slider">
            <div class="Modern-Slider content-section" id="top">
                <!-- Item -->
                
                <!-- // Item -->
                <!-- Item -->
                <div class="item item-2">
                    
                      <a href="addUserconection.php" class="button">Se Connecter</a>

  <form action="" method="POST">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" placeholder="Nom" required minlength="3">
    <span id="nom-error" class="error-message"></span><br>

    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" id="prenom" placeholder="Prénom" required minlength="3">
    <span id="prenom-error" class="error-message"></span><br>

    <label for="cin">Cin :</label>
    <input type="text" name="cin" id="cin" placeholder="Cin">
    <span id="cin-error" class="error-message"></span><br>

    <label for="email">Email :</label>
    <input type="email" name="email" id="email" placeholder="Email" required>
    <span id="email-error" class="error-message"></span><br>

    <label for="mot_de_passe">Mot de passe :</label>
    <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Mot de passe" required minlength="6">
    <span id="mot_de_passe-error" class="error-message"></span><br>

    <label for="role">Rôle :</label>
    <select name="role" id="role" required>
        <option value="">Sélectionner un rôle</option>
        <option value="Etudiant">Étudiant</option>
        <option value="Parent">Parent</option>
        <option value="Enseignant">Enseignant</option>
    </select>
    <span id="role-error" class="error-message"></span><br>

    <label for="telephone">Téléphone :</label>
    <input type="text" name="telephone" id="telephone" placeholder="Téléphone">
    <span id="telephone-error" class="error-message"></span><br>

    <label for="adresse">Adresse :</label>
    <input type="text" name="adresse" id="adresse" placeholder="Adresse" required minlength="4">
    <span id="adresse-error" class="error-message"></span><br>

    <button type="submit">Ajouter l'utilisateur</button>
</form>

<script src="addUser.js"></script>
          
              

        <div class="page-content">
            
                     
          
           
            
            <section class="footer">
                <p>Copyright &copy; 2019 Company Name 
                
                . Design: TemplateMo</p>
            </section>
        </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="jsf/vendor/bootstrap.min.js"></script>
    
    <script src="jsf/plugins.js"></script>
    <script src="jsf/main.js"></script>

    <script>
        // Hide Header on on scroll down
        var didScroll;
        var lastScrollTop = 0;
        var delta = 5;
        var navbarHeight = $('header').outerHeight();

        $(window).scroll(function(event){
            didScroll = true;
        });

        setInterval(function() {
            if (didScroll) {
                hasScrolled();
                didScroll = false;
            }
        }, 250);

        function hasScrolled() {
            var st = $(this).scrollTop();
            
            // Make sure they scroll more than delta
            if(Math.abs(lastScrollTop - st) <= delta)
                return;
            
            // If they scrolled down and are past the navbar, add class .nav-up.
            // This is necessary so you never see what is "behind" the navbar.
            if (st > lastScrollTop && st > navbarHeight){
                // Scroll Down
                $('header').removeClass('nav-down').addClass('nav-up');
            } else {
                // Scroll Up
                if(st + $(window).height() < $(document).height()) {
                    $('header').removeClass('nav-up').addClass('nav-down');
                }
            }
            
            lastScrollTop = st;
        }
    </script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>

</body>
</html>