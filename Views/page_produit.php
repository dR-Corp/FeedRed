<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Feed|Red</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= ASSETS;?>space/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?= ASSETS;?>space/assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?= ASSETS;?>space/assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="<?= ASSETS;?>space/assets/css/animated.css">
    <link rel="stylesheet" href="<?= ASSETS;?>space/assets/css/owl.css">
<!--
    
TemplateMo 562 Space Dynamic

https://templatemo.com/tm-562-space-dynamic

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="accueil.html" class="logo">
              <img src="<?= ASSETS ?>space/assets/images/feed-agency.png" class="" style="" alt="">
              <!-- <h4>Feed<span>Red</span></h4> -->
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Produit </a></li>
              <li class="scroll-to-section"><a href="#about">Aperçu</a></li>
              <li class="scroll-to-section"><a href="#services">Pourquoi</a></li>
              <li class="scroll-to-section"><a href="#portfolio">Bénificiez</a></li>
              <li class="scroll-to-section"><div class="main-red-button"><a href="#contact">Contactez-nous</a></div></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <style>
    .description-page {
      font-size: large;
      color: gray;
      font-weight: bold;
      text-shadow: 2px 2px 10px #5b32b47e;
      /* background-image: url(<?= ASSETS;?>space/assets/images/baner-dec-left.png); */
    }
    .description-raison {
      font-size: large;
      color: gray;
      font-weight: bold;
      text-shadow: 2px 2px 10px #5b32b47e;
      text-align: justify;
    }
    .description-portfolio {
      font-size: large;
      color: gray;
      font-weight: bold;
      text-shadow: 2px 2px 10px #5b32b47e;
      padding-bottom: 120px;
    }
    .sect {
      background-image: url('<?php echo ASSETS?>space/assets/images/band.png');
      background-size: cover;
      background-position: bottom;
      margin-top: 120px;
    }
    @media (min-width: 991px) {
      .vertical-bottom {
        position: absolute; 
        bottom: 50;
        right: 0;
      }
    }
  </style>
  <!-- ***** Header Area End ***** -->
  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-7 align-self-center">
              <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <h6>Produit de FeedRed</h6>
                <h2>
                  Nos comptes client,<br>
                  la <em>solution clé en main</em> pour la rédaction d'articles
                </h2>
                <!-- <h2>
                  Un compte client pour <br>la <em>délégation</em> et un <em>suivi en temps réel</em>
                </h2> -->
                <p class="description-page">Obtenez un compte client chez Feed Agency et profitez de la simplicité et de la rapidité pour passer vos commandes de rédaction d'articles à tout moment. Grâce à votre compte, vous pourrez suivre l'évolution de vos commandes en temps réel et être informé de chaque étape de la rédaction de vos articles. Ne perdez plus de temps et optez pour la solution la plus efficace pour la rédaction de vos contenus : créez votre compte client dès maintenant !</p>
                <form id="search" action="#" method="GET">
                  <fieldset>
                    <input type="address" name="address" class="email" placeholder="Votre mail ..." autocomplete="on" required>
                  </fieldset>
                  <fieldset>
                    <button type="submit" class="main-button">Demander maintenant</button>
                  </fieldset>
                </form>
              </div>
            </div>
            <div class="col-lg-5 vertical-bottom">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="<?= ASSETS;?>space/assets/images/hero.png" alt="team meeting">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="about" class="about-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="left-image wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
            <img src="<?= ASSETS;?>space/assets/images/about-left-image.png" alt="person graphic">
          </div>
        </div>
        <div class="col-lg-8 align-self-center">
          <div class="services">
            <div class="row">
              <div class="col-lg-6">
                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                  <div class="icon">
                    <img src="<?= ASSETS;?>space/assets/images/service-icon-01.png" alt="reporting">
                  </div>
                  <div class="right-text">
                    <h4>Commander</h4>
                    <p>Commandez à tout moment la rédaction de vos articles</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
                  <div class="icon">
                    <img src="<?= ASSETS;?>space/assets/images/service-icon-02.png" alt="">
                  </div>
                  <div class="right-text">
                    <h4>Suivre</h4>
                    <p>Suivez en temps réel les phases d’évolutions de vos rédactions</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.9s">
                  <div class="icon">
                    <img src="<?= ASSETS;?>space/assets/images/service-icon-03.png" alt="">
                  </div>
                  <div class="right-text">
                    <h4>Valider</h4>
                    <p>Acceptez ou demander la modification d’une rédaction depuis le compte</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="1.1s">
                  <div class="icon">
                    <img src="<?= ASSETS;?>space/assets/images/service-icon-04.png" alt="">
                  </div>
                  <div class="right-text">
                    <h4>Voir les stats</h4>
                    <p>Faites l’analyse de vos activités de rédactions grâce à notre tableau de bord</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="services" class="our-services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="left-image">
            <img src="<?= ASSETS;?>space/assets/images/services-left-image.png" alt="">
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="section-heading">
            <h2 class="py-5">
              Demandez aujourd'hui c'est vous <em>faciliter vous la vie</em> et <span>rester au courant</span>
            </h2>
          </div>
          <div class="row">
            <div class="col-lg-12 mt-lg-2">
              <div class="first-bar progress-skill-bar">
                <h4>Clients utilisateurs</h4>
                <span class="ml-3" >+ de 300 comptes</span>
                <div class="filled-bar"></div>
                <div class="full-bar"></div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="first-bar progress-skill-bar">
                <h4>Articles commandés </h4>
                <span class="ml-3" >+ de 12000</span>
                <div class="filled-bar"></div>
                <div class="full-bar"></div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="first-bar progress-skill-bar">
                <h4>Rédactions acceptées</h4>
                <span class="ml-3" >+ de 12000</span>
                <div class="filled-bar"></div>
                <div class="full-bar"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-lg-6 p-5 card bg-light text-justify">
          <h1>01 - Simplicité et rapidité</h1><hr>
          <p class="description-raison">Avec un compte client, vous pouvez passer vos commandes de rédaction d'articles en quelques clics, depuis n'importe où et à tout moment. Cela vous permet de gagner du temps et de ne pas avoir à vous déplacer ou à attendre des horaires d'ouverture pour passer votre commande.</p>
        </div>
        <div class="col-lg-6 p-5 card bg-light text-justify">
          <h1>02 - Suivi en temps réel</h1><hr>
          <p class="description-raison">Grâce à votre compte client, vous pouvez suivre l'évolution de vos commandes en temps réel et être informé de chaque étape de la rédaction de vos articles. Vous pouvez également accéder à toutes les informations concernant vos commandes passées, ce qui vous permet de mieux gérer votre budget et de planifier vos prochaines commandes.</p>
        </div>
        <div class="col-lg-6 p-5 card bg-light text-justify">
          <h1>03 - Accès à des offres exclusives</h1><hr>
          <p class="description-raison">En tant que client, vous pouvez bénéficier d'offres exclusives et de tarifs préférentiels pour la rédaction de vos articles. Cela peut vous permettre de réaliser des économies sur vos commandes de contenu.</p>
        </div>
        <div class="col-lg-6 p-5 card bg-light text-justify">
          <h1>04 - Personnalisation de votre expérience</h1><hr>
          <p class="description-raison">Avec un compte client, vous pouvez personnaliser votre expérience en enregistrant vos préférences et en accédant à des outils personnalisés. Cela vous permet de mieux gérer vos commandes et de mieux collaborer avec les rédacteurs de Feed Agency.</p>
        </div>
      </div>
      <div class="row card p-4 bg-light">
        <div class="col-lg-12">
          <p class="description-raison">En résumé, obtenir un compte client chez Feed Agency vous permet de passer vos commandes de rédaction d'articles de manière simple et rapide, de suivre l'évolution de vos commandes en temps réel, de bénéficier d'offres exclusives et de personnaliser votre expérience. Cela peut vous aider à mieux gérer vos commandes de contenu et à obtenir des résultats optimaux pour votre site web.</p>
        </div>
      </div>
    </div>
  </div>

  <div id="sect" class="our-sect sect">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 pb-4 pt-0 px-2 align-self-center">
          <form id="search" action="#" method="GET">
            <fieldset>
              <input type="address" name="address" class="email" placeholder="Votre mail ..." autocomplete="on" required>
            </fieldset>
            <fieldset>
              <button type="submit" class="main-button">Demander maintenant</button>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div id="portfolio" class="our-portfolio section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
            <h2>Bénéficiez de <em>avantages</em> <span>multiples</span></h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-10 offset-lg-1 text-center description-portfolio">
          Avec Feed Agency, profitez de services complémentaires pour optimiser vos contenus et vous faciliter la vie. Grâce à YourText Guru, optimisez la qualité de vos textes en un rien de temps. Avec Quetext, vérifiez que vos contenus sont uniques et ne sont pas copiés sur d'autres sources. Et enfin, laissez-nous publier directement vos articles sur votre site internet selon les meilleurs standards pour une présentation impeccable de vos contenus. Ne perdez plus de temps et optez pour la solution complète de Feed Agency pour produire du contenu de qualité rapidement et sans effort.
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-sm-6">
          <a href="#">
            <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
              <div class="hidden-content">
                <h4>Processus très faciles</h4>
                <p>Passez commandes facilement et validez les rédactions de façon simple</p>
              </div>
              <div class="showed-content">
                <img src="<?= ASSETS;?>space/assets/images/portfolio-image.png" alt="">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-sm-6">
          <a href="#">
            <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.4s">
              <div class="hidden-content">
                <h4>Gain de temps</h4>
                <p>Sentez-vous libéré, on s’occupe de tout pour vous du début à la fin</p>
              </div>
              <div class="showed-content">
                <img src="<?= ASSETS;?>space/assets/images/portfolio-image.png" alt="">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-sm-6">
          <a href="#">
            <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.5s">
              <div class="hidden-content">
                <h4>Service de qualité</h4>
                <p>Profitez de délais très courts avec le garanti d’une rédaction de qualités</p>
              </div>
              <div class="showed-content">
                <img src="<?= ASSETS;?>space/assets/images/portfolio-image.png" alt="">
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-sm-6">
          <a href="#">
            <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.6s">
              <div class="hidden-content">
                <h4>Des traces et un suivi</h4>
                <p>Conservez vos commandes, suivez toutes les phases de rédaction, obtenez des stats en temps réel</p>
              </div>
              <div class="showed-content">
                <img src="<?= ASSETS;?>space/assets/images/portfolio-image.png" alt="">
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div id="blog" class="our-blog section"></div>

  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <div class="section-heading">
            <h2>Sentez vous libre de nous envoyer un message</h2>
            <p>Notre équipe est à votre disposition pour tous vos besoins, et se fera le plaisir de vous répondre de plus vite possible !</p>
            <div class="phone-info">
              <h4><span><i class="fa fa-envelope"></i> feedagency01@gmail.com</span></h4>
            </div>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="" method="post">
            <div class="row">
              <div class="col-lg-12">
                <fieldset>
                  <input type="name" name="name" id="name" placeholder="Nom" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Email" required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>  
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="main-button ">Envoyer</button>
                </fieldset>
              </div>
            </div>
            <div class="contact-dec">
              <img src="<?= ASSETS;?>space/assets/images/contact-decoration.png" alt="">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="footer-text text-center">
            <h2>FeedRed</h2>
        </div>
        <!-- social icon-->
        <div class="footer-social-icon text-center">
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="active fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
        </div>
        <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
          <p>© Copyright 2022 Feed Agency. Tous les droits réservés.           
          <br>Designed by: <a rel="nofollow" href="https://kart-school.com">K'ART</a></p>
        </div>
      </div>
    </div>
  </footer>
  <!-- Scripts -->
  <script src="<?= ASSETS;?>space/vendor/jquery/jquery.min.js"></script>
  <script src="<?= ASSETS;?>space/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= ASSETS;?>space/assets/js/owl-carousel.js"></script>
  <script src="<?= ASSETS;?>space/assets/js/animation.js"></script>
  <script src="<?= ASSETS;?>space/assets/js/imagesloaded.js"></script>
  <script src="<?= ASSETS;?>space/assets/js/templatemo-custom.js"></script>

</body>
</html>