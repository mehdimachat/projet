<?php
session_start();
require_once '../Controller/notifC.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: addUserconection.php');
    exit();
}
$user_id = $_SESSION['user_id'];
$notifC = new NotifC();
$notifications = $notifC->getNotificationsByUserId($user_id);
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <link href="https://fontsf.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

        <script src="jsf/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <style>
            /* Style du formulaire */
            h1{
              color: black;}
              .button {
  position: relative;
  top: -200px; /* Décalage vers le bas */
  left: 600px; /* Décalage vers la droite */
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
                        <li><a href="#l">S'inscrire</a></li>
                        <li><a href="#projects">Recent Projects</a></li>
                        <li><a href="#video">Presentation</a></li>
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
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#l">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            S'inscrire
                        </a>
                    </li>
                    <li>
                        <a href="#projects">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            Recent Work
                        </a>
                    </li>
                    <li>
                        <a href="#video">
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
              
              <div class="main-banner" id="top">
              <h1>Bienvenue, <?php echo $_SESSION['user_nom']; ?> a votre espace parent!</h1>
              <section id="notifications" class="content-section">
    <h2>Vos Notifications</h2>
    <?php if ($notifications): ?>
        <?php foreach ($notifications as $notif): ?>
            <div class="notification">
                <!-- Bouton avec une icône de notification (utilisation de FontAwesome pour l'icône) -->
                <button class="notification-button" onclick="toggleNotificationDetails(this)">
                    <i class="fa fa-bell"></i>
                </button>
                <!-- Contenu caché de la notification -->
                <div class="notification-details" style="display: none;">
                    <h3><?php echo htmlspecialchars($notif['titre']); ?></h3>
                    <p><?php echo nl2br(htmlspecialchars($notif['contenu'])); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Vous n'avez pas de notifications.</p>
    <?php endif; ?>
</section>

<script>
    function toggleNotificationDetails(button) {
        // Trouve le conteneur des détails de la notification
        const details = button.nextElementSibling;
        if (details.style.display === 'none') {
            details.style.display = 'block';
        } else {
            details.style.display = 'none';
        }
    }
</script>

<style>
    .notification-button {
        background-color: #007BFF; /* Couleur du bouton */
        color: white; /* Couleur de l'icône */
        border: none;
        padding: 10px;
        border-radius: 50%; /* Pour rendre le bouton circulaire */
        cursor: pointer;
        font-size: 24px;
        margin-bottom: 10px;
        display: inline-block;
    }
    .notification-button:hover {
        background-color: #0056b3;
    }
    .notification-details {
        
    }
    .fa-bell {
        font-size: 24px; /* Taille de l'icône */
    }
</style>
              <a href="logout.php" class="button">Déconnexion</a>
              </div>
          
                </div>
                <!-- // Item -->
                <!-- Item -->
               
                <!-- // Item -->
            </div>
        </div>


      
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

