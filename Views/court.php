<?php
session_start();
require_once '../Controller/notifC.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: addUserconection.php');
    exit();
}

// Inclure le fichier de la classe de contrôle des notifications

// Récupérer les notifications pour l'utilisateur connecté
$user_id = $_SESSION['user_id'];
$notifC = new NotifC();
$notifications = $notifC->getNotificationsByUserId($user_id);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Sentra - Free Bootstrap  Theme</title>
        
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
  top: 4px; /* Décalage vers le bas */
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
              <h1>Bienvenue, <?php echo $_SESSION['user_nom']; ?> a votre espace etudiant!</h1>
              <div class="page-content">
    
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
    </div>
              <a href="logout.php" class="button">Déconnexion</a>
              </div>
          
                </div>
                <!-- // Item -->
                <!-- Item -->
               
                <!-- // Item -->
            </div>
        </div>


        <div class="page-content">
            <section id="featured" class="content-section">
                <div class="section-heading">
                    <h1>Featured<br><em>Places</em></h1>
                    <p>Praesent pellentesque efficitur magna, 
                    <br>sed pellentesque neque malesuada vitae.</p>
                </div>
                <div class="section-content">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="image">
                                <img src="imgf/featured_1.jpg" alt="">
                                <div class="featured-button button">
                                    <a href="#projects">Continue Reading</a>
                                </div>
                            </div>
                            <div class="text-content">
                                <h4>Lorem ipsum dolor</h4>
                                <span>Proin et sapien</span>
                                <p>#1 You are allowed to use Sentra Template for your business or client websites. You can use it for commercial or non-commercial or educational purposes.</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img src="imgf/featured_2.jpg" alt="">
                                <div class="featured-button button">
                                    <a href="#projects">Continue Reading</a>
                                </div>
                            </div>
                            <div class="text-content">
                                <h4>Phasellus a lacus ac odio</h4>
                                <span>Maximus</span>
                                <p>#2 You are NOT allowed to re-distribute this on any template website. You <strong>can post</strong> a screenshot and a link back to original template page on your blog or site. Thank you.</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img src="imgf/featured_3.jpg" alt="">
                                <div class="featured-button button">
                                    <a href="#projects">Continue Reading</a>
                                </div>
                            </div>
                            <div class="text-content">
                                <h4>Proin sit amet fringilla</h4>
                                <span>Vulputate</span>
                                <p>#3 Aliquam mollis lacus eget metus efficitur lobortis. Suspendisse libero lacus, accumsan vitae commodo tristique, luctus gravida metus.</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img src="imgf/featured_2.jpg" alt="">
                                <div class="featured-button button">
                                    <a href="#projects">Continue Reading</a>
                                </div>
                            </div>
                            <div class="text-content">
                                <h4>In volutpat augue lectus</h4>
                                <span>Elementum</span>
                                <p>#4 Aliquam mollis lacus eget metus efficitur lobortis. Suspendisse libero lacus, accumsan vitae commodo tristique, luctus gravida metus.</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img src="imgf/featured_1.jpg" alt="">
                                <div class="featured-button button">
                                    <a href="#projects">Continue Reading</a>
                                </div>
                            </div>
                            <div class="text-content">
                                <h4>Cras commodo odio</h4>
                                <span>Aliquam</span>
                                <p>#5 Mauris lacinia pretium libero, ut tincidunt lacus molestie ornare. Phasellus a facilisis erat. Praesent eleifend nibh mauris, quis sodales lorem convallis pulvinar.</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img src="imgf/featured_3.jpg" alt="">
                                <div class="featured-button button">
                                    <a href="#projects">Continue Reading</a>
                                </div>
                            </div>
                            <div class="text-content">
                                <h4>Sed at massa turpis</h4>
                                <span>Curabitur</span>
                                <p>#6 Vestibulum tincidunt ornare ligula vel molestie. Curabitur hendrerit mauris mollis ipsum vulputate rutrum. Phasellus luctus odio eget dui imperdiet.</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img src="imgf/featured_2.jpg" alt="">
                                <div class="featured-button button">
                                    <a href="#projects">Continue Reading</a>
                                </div>
                            </div>
                            <div class="text-content">
                                <h4>Aliquam mollis lacus</h4>
                                <span>Suspendisse</span>
                                <p>#7 Suspendisse suscipit nulla sed nisl fermentum, auctor suscipit nunc rhoncus. Proin faucibus metus diam, nec hendrerit purus pharetra in.</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img src="imgf/featured_1.jpg" alt="">
                                <div class="featured-button button">
                                    <a href="#projects">Continue Reading</a>
                                </div>
                            </div>
                            <div class="text-content">
                                <h4>Mauris lacinia pretium</h4>
                                <span>Vestibulum</span>
                                <p>#8 Suspendisse suscipit nulla sed nisl fermentum, auctor suscipit nunc rhoncus. Proin faucibus metus diam, nec hendrerit purus pharetra in.</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img src="imgf/featured_3.jpg" alt="">
                                <div class="featured-button button">
                                    <a href="#projects">Continue Reading</a>
                                </div>
                            </div>
                            <div class="text-content">
                                <h4>Proin sit amet fringilla erat</h4>
                                <span>Convallis</span>
                                <p>#9 Suspendisse suscipit nulla sed nisl fermentum, auctor suscipit nunc rhoncus. Proin faucibus metus diam, nec hendrerit purus pharetra in.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="projects" class="content-section">
                <div class="section-heading">
                   
    <h2> LEARNIFY </h2>

    <p>
    
    Learnify est une plateforme éducative conçue pour centraliser
    et simplifier la gestion des informations scolaires.
    Elle permet aux élèves d’accéder facilement à leurs 
    cours, emploi du temps, notes, et ressources pour se préparer 
    aux examens. Les parents peuvent suivre la présence et les résultats 
    de leurs enfants, tout en communiquant avec les enseignants. 
    Ces derniers partagent des ressources pédagogiques, gèrent les 
    évaluations et échangent directement avec les familles.
    Quant aux administrateurs, ils organisent les emplois du temps
    , suivent les données de l’école et publient des annonces importantes.
    En regroupant toutes ces fonctionnalités, ELT rend l’apprentissage 
    plus clair et structuré pour tous.
    </p>
                </div>
                <div class="section-content">
                    <div class="masonry">
                        <div class="row">
                            <div class="item">
                                
                            </div>
                            <div class="item second-item">
                                
                            </div>
                            <div class="item">
                                
                            </div>
                            <div class="item">
                                
                            </div>
                            <div class="item">
                                
                            </div>
                        </div>
                    </div>
                </div>            
            </section>
            <section id="video" class="content-section">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h1>This is a <em>company</em> presentation.</h1>
                            <p>Praesent pellentesque efficitur magna, sed pellentesque neque malesuada vitae.</p>
                        </div>
                        <div class="text-content">
                            <p>In eget ipsum sed lorem vehicula luctus. Curabitur non dolor rhoncus, hendrerit justo sit amet, vestibulum turpis. Pellentesque id auctor tellus, vel ultricies augue. Duis condimentum aliquet blandit. Fusce rhoncus et eros ut pharetra. Phasellus convallis ultricies ligula ac gravida.</p>
                        </div>
                        <div class="accent-button button">
                            <a href="#blog">Continue Reading</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="box-video">
                            <div class="bg-video" style="background-image: url(https://unsplash.imgix.net/photo-1425036458755-dc303a604201?fit=crop&fm=jpg&q=75&w=1000);">
                                <div class="bt-play">Play</div>
                            </div>
                            <div class="video-container">
                                <iframe width="100%" height="520" src="https://www.youtube.com/embed/j-_7Ub-Zkow?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="blog" class="content-section">
                <div class="section-heading">
                    <h1>Blog<br><em>Entries</em></h1>
                    <p>Curabitur hendrerit mauris mollis ipsum vulputate rutrum. 
                    <br>Phasellus luctus odio eget dui imperdiet.</p>
                </div>
                <div class="section-content">
                    <div class="tabs-content">
                        <div class="wrapper">
                            <ul class="tabs clearfix" data-tabgroup="first-tab-group">
                              <li><a href="#tab1" class="active">July 2018</a></li>
                              <li><a href="#tab2">June 2018</a></li>
                              <li><a href="#tab3">May 2018</a></li>
                              <li><a href="#tab4">April 2018</a></li>
                            </ul>
                            <section id="first-tab-group" class="tabgroup">
                                <div id="tab1">
                                    <ul>
                                        <li>
                                            <div class="item">
                                                <img src="imgf/blog_1.jpg" alt="">
                                                <div class="text-content">
                                                    <h4>Integer ultrices augue</h4>
                                                    <span>25 July 2018</span>
                                                    <p>Nam vel egestas nisi. Nullam lobortis magna at enim venenatis luctus. Nam finibus, mauris eu dictum iaculis, dolor tortor cursus quam, in volutpat augue lectus sed magna. Integer mollis lorem quis ipsum maximus finibus.</p>
                                                    
                                                    <div class="accent-button button">
                                                        <a href="#contact">Continue Reading</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="item">
                                                <img src="imgf/blog_2.jpg" alt="">
                                                <div class="text-content">
                                                    <h4>Cras commodo odio ut</h4>
                                                    <span>16 July 2018</span>
                                                    <p>Nam vel egestas nisi. Nullam lobortis magna at enim venenatis luctus. Nam finibus, mauris eu dictum iaculis, dolor tortor cursus quam, in volutpat augue lectus sed magna. Integer mollis lorem quis ipsum maximus finibus.</p>
                                                    
                                                    <div class="accent-button button">
                                                        <a href="#contact">Continue Reading</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="item">
                                                <img src="imgf/blog_3.jpg" alt="">
                                                <div class="text-content">
                                                    <h4>Sed at massa turpis</h4>
                                                    <span>10 July 2018</span>
                                                    <p>Nam vel egestas nisi. Nullam lobortis magna at enim venenatis luctus. Nam finibus, mauris eu dictum iaculis, dolor tortor cursus quam, in volutpat augue lectus sed magna. Integer mollis lorem quis ipsum maximus finibus.</p>
                                                    
                                                    <div class="accent-button button">
                                                        <a href="#contact">Continue Reading</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div id="tab2">
                                    <ul>
                                        <li>
                                            <div class="item">
                                                <img src="imgf/blog_3.jpg" alt="">
                                                <div class="text-content">
                                                    <h4>Sed at massa turpis</h4>
                                                    <span>30 June 2018</span>
                                                    <p>Nam vel egestas nisi. Nullam lobortis magna at enim venenatis luctus. Nam finibus, mauris eu dictum iaculis, dolor tortor cursus quam, in volutpat augue lectus sed magna. Integer mollis lorem quis ipsum maximus finibus.</p>
                                                    
                                                    <div class="accent-button button">
                                                        <a href="#contact">Continue Reading</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="item">
                                                <img src="imgf/blog_1.jpg" alt="">
                                                <div class="text-content">
                                                    <h4>Lorem ipsum dolor sit</h4>
                                                    <span>24 June 2018</span>
                                                    <p>Nam vel egestas nisi. Nullam lobortis magna at enim venenatis luctus. Nam finibus, mauris eu dictum iaculis, dolor tortor cursus quam, in volutpat augue lectus sed magna. Integer mollis lorem quis ipsum maximus finibus.</p>
                                                    
                                                    <div class="accent-button button">
                                                        <a href="#contact">Continue Reading</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="item">
                                                <img src="imgf/blog_2.jpg" alt="">
                                                <div class="text-content">
                                                    <h4>Cras commodo odio ut</h4>
                                                    <span>12 June 2018</span>
                                                    <p>Nam vel egestas nisi. Nullam lobortis magna at enim venenatis luctus. Nam finibus, mauris eu dictum iaculis, dolor tortor cursus quam, in volutpat augue lectus sed magna. Integer mollis lorem quis ipsum maximus finibus.</p>
                                                    
                                                    <div class="accent-button button">
                                                        <a href="#contact">Continue Reading</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div id="tab3">
                                    <ul>
                                        <li>
                                            <div class="item">
                                                <img src="imgf/blog_2.jpg" alt="">
                                                <div class="text-content">
                                                    <h4>Cras commodo odio ut</h4>
                                                    <span>26 May 2018</span>
                                                    <p>Nam vel egestas nisi. Nullam lobortis magna at enim venenatis luctus. Nam finibus, mauris eu dictum iaculis, dolor tortor cursus quam, in volutpat augue lectus sed magna. Integer mollis lorem quis ipsum maximus finibus.</p>
                                                    
                                                    <div class="accent-button button">
                                                        <a href="#contact">Continue Reading</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="item">
                                                <img src="imgf/blog_1.jpg" alt="">
                                                <div class="text-content">
                                                    <h4>Lorem ipsum dolor sit</h4>
                                                    <span>22 May 2018</span>
                                                    <p>Nam vel egestas nisi. Nullam lobortis magna at enim venenatis luctus. Nam finibus, mauris eu dictum iaculis, dolor tortor cursus quam, in volutpat augue lectus sed magna. Integer mollis lorem quis ipsum maximus finibus.</p>
                                                    
                                                    <div class="accent-button button">
                                                        <a href="#contact">Continue Reading</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="item">
                                                <img src="imgf/blog_3.jpg" alt="">
                                                <div class="text-content">
                                                    <h4>Integer ultrices augue</h4>
                                                    <span>8 May 2018</span>
                                                    <p>Nam vel egestas nisi. Nullam lobortis magna at enim venenatis luctus. Nam finibus, mauris eu dictum iaculis, dolor tortor cursus quam, in volutpat augue lectus sed magna. Integer mollis lorem quis ipsum maximus finibus.</p>
                                                    
                                                    <div class="accent-button button">
                                                        <a href="#contact">Continue Reading</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div id="tab4">
                                    <ul>
                                        <li>
                                            <div class="item">
                                                <img src="imgf/blog_1.jpg" alt="">
                                                <div class="text-content">
                                                    <h4>Lorem ipsum dolor sit</h4>
                                                    <span>26 April 2018</span>
                                                    <p>Nam vel egestas nisi. Nullam lobortis magna at enim venenatis luctus. Nam finibus, mauris eu dictum iaculis, dolor tortor cursus quam, in volutpat augue lectus sed magna. Integer mollis lorem quis ipsum maximus finibus.</p>
                                                    
                                                    <div class="accent-button button">
                                                        <a href="#contact">Continue Reading</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>                                
                                        <li>
                                            <div class="item">
                                                <img src="imgf/blog_3.jpg" alt="">
                                                <div class="text-content">
                                                    <h4>Integer ultrices augue eu</h4>
                                                    <span>24 April 2018</span>
                                                    <p>Nam vel egestas nisi. Nullam lobortis magna at enim venenatis luctus. Nam finibus, mauris eu dictum iaculis, dolor tortor cursus quam, in volutpat augue lectus sed magna. Integer mollis lorem quis ipsum maximus finibus.</p>
                                                    
                                                    <div class="accent-button button">
                                                        <a href="#contact">Continue Reading</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="item">
                                                <img src="imgf/blog_2.jpg" alt="">
                                                <div class="text-content">
                                                    <h4>Cras commodo odio ut</h4>
                                                    <span>20 April 2018</span>
                                                    <p>Nam vel egestas nisi. Nullam lobortis magna at enim venenatis luctus. Nam finibus, mauris eu dictum iaculis, dolor tortor cursus quam, in volutpat augue lectus sed magna. Integer mollis lorem quis ipsum maximus finibus.</p>
                                                    
                                                    <div class="accent-button button">
                                                        <a href="#contact">Continue Reading</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </section> 
                        </div>
                    </div>
                </div>
            </section>
            <section id="contact" class="content-section">
                <div id="map">
                
                	<!-- How to change your own map point
                           1. Go to Google Maps
                           2. Click on your location point
                           3. Click "Share" and choose "Embed map" tab
                           4. Copy only URL and paste it within the src="" field below
                    -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1197183.8373802372!2d-1.9415093691103689!3d6.781986417238027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdb96f349e85efd%3A0xb8d1e0b88af1f0f5!2sKumasi+Central+Market!5e0!3m2!1sen!2sth!4v1532967884907" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div id="contact-content">
                    <div class="section-heading">
                        <h1>Contact<br><em>Sentra</em></h1>
                        <p>Curabitur hendrerit mauris mollis ipsum vulputate rutrum. 
                        <br>Phasellus luctus odio eget dui imperdiet.</p>
                        
                    </div>
                    <div class="section-content">
                        <form id="contact" action="#" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                  <fieldset>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                                  </fieldset>
                                </div>
                                <div class="col-md-4">
                                  <fieldset>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Your email..." required="">
                                  </fieldset>
                                </div>
                                 <div class="col-md-4">
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
                                    <button type="submit" id="form-submit" class="btn">Send Message Now</button>
                                  </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
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

