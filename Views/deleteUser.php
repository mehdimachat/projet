<?php
require_once '../Controller/UserC.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $userC = new UserC();
    $userC->deleteUser($id);
    header("Location: listUser.php");
    exit();
} else {
    echo "";
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
             /* Conteneur du formulaire */
.form-container {
    width: 400px; /* Largeur fixe */
    margin: 50px auto; /* Centre horizontalement et ajoute un espacement vertical */
    padding: 20px; /* Espacement interne */
    background-color: #0d6efd; /* Fond bleu */
    color: white; /* Texte blanc */
    border-radius: 10px; /* Coins arrondis */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre légère */
    font-family: Arial, sans-serif; /* Police moderne */
}

/* Titre du formulaire */
.form-container h2 {
    text-align: center; /* Centrer le titre */
    margin-bottom: 20px; /* Espacement sous le titre */
    font-size: 24px; /* Taille du titre */
}

/* Labels */
.form-container label {
    display: block; /* Affichage en bloc pour alignement vertical */
    margin-bottom: 10px; /* Espacement sous le label */
    font-size: 16px; /* Taille de la police */
    font-weight: bold; /* Texte en gras */
}

/* Champ de saisie */
.form-container input {
    width: 100%; /* Prend toute la largeur */
    padding: 10px; /* Espacement interne */
    margin-bottom: 20px; /* Espacement sous le champ */
    border: none; /* Pas de bordure */
    border-radius: 5px; /* Coins arrondis */
    font-size: 16px; /* Taille du texte */
}

/* Bouton de soumission */
.form-container button {
    width: 100%; /* Prend toute la largeur */
    padding: 10px; /* Espacement interne */
    background-color: white; /* Fond blanc */
    color: #0d6efd; /* Texte bleu */
    border: none; /* Pas de bordure */
    border-radius: 5px; /* Coins arrondis */
    font-size: 16px; /* Taille du texte */
    font-weight: bold; /* Texte en gras */
    cursor: pointer; /* Curseur en forme de main */
    transition: background-color 0.3s ease, color 0.3s ease; /* Transition fluide */
}

/* Effet au survol du bouton */
.form-container button:hover {
    background-color: #cce5ff; /* Bleu clair */
    color: #0a58ca; /* Bleu plus foncé */
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

          <div class="form-container">
        <h2>Supprimer un utilisateur</h2>
        
        <form action="deleteUser.php" method="get">
            <label for="userId">ID de l'utilisateur :</label>
            <input type="number" id="userId" name="id" required>
            <button type="submit">Supprimer</button>
        </form>
    </div>
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



