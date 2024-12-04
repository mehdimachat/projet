<?php
session_start(); // Démarrage de la session
require_once '../Controller/UserC.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $mot_de_passe = $_POST['mot_de_passe'] ?? '';

    if (!empty($email) && !empty($mot_de_passe)) {
        $userC = new UserC();
        $user = $userC->loginUser($email, $mot_de_passe);

        if ($user) {
            // Stocker les informations utilisateur dans la session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_nom'] = $user['nom'];
            $_SESSION['user_role'] = $user['role'];
            if ($user['role'] == 'admin') {
              $_SESSION['user'] = $user; // Store user data in the session
              header("Location: login.php"); // Redirect to listUser.php
              exit;
          }
          if ($user['role'] == 'Parent') {
            $_SESSION['user'] = $user; // Store user data in the session
            header("Location: courtParent.php"); // Redirect to listUser.php
            exit;
        }
        if ($user['role'] == 'Enseignant') {
          $_SESSION['user'] = $user; // Store user data in the session
          header("Location: courEnseignant.php"); // Redirect to listUser.php
          exit;
      }
      if ($user['role'] == 'Etudiant') {
        $_SESSION['user'] = $user; // Store user data in the session
        header("Location: court.php"); // Redirect to listUser.php
        exit;
    }

            // Rediriger vers la page "court.php"
            ////header('Location: court.php');
            exit();
        } else {
            $error = "Email ou mot de passe incorrect ou tu doit t'inscrire.";
            $error = "
<div style='
    color: red; 
    background-color: #ffe6e6; 
    border: 1px solid red; 
    padding: 10px; 
    border-radius: 5px; 
    width: 50%; 
    margin: 0 auto; 
    text-align: center; 
    position: absolute; 
    top: 75%; 
    left: 60%; 
    transform: translate(-50%, -50%);
'>
    Email ou mot de passe incorrect ou vous devez vous inscrire.
</div>";
echo $error;



        }
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
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
            form {
    position: relative;
    top: 150px; /* Décalage vers le bas */
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
        footer{
          color: black;
        }
        .button {
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


                  


    
    
                    
                      <a href="addUser.php" class="button">S'inscrire</a>
                      <a href="homefront.php" class="button">Return Home</a>
                      <a href="forgot_Password.php" class="button">mot de passe oubliée</a>

  <form action="addUserconection.php" method="POST">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" placeholder="Email" required>
        <span id="email-error" class="error-message"></span><br>

        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Mot de passe" required>
        <span id="mot_de_passe-error" class="error-message"></span><br>

        <button type="submit">Connexion</button>
    </form>
 

    <!-- Lien vers le fichier JavaScript -->
    <script src="addUserconection.js"></script>
    <?php if (!empty($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
              

       
            
                     
          
           

        

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


