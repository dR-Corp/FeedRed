<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>FeedRed</title>

    <!-- Favicon -->
    <link rel="icon" href="<?= ASSETS;?>orlib/img/core-img/as.jpg">

    <!-- Core Stylesheet -->
    <link href="<?= ASSETS;?>orlib/style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="<?= ASSETS;?>orlib/css/responsive.css" rel="stylesheet">
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Toastr -->
    <link rel="stylesheet" href="<?= ASSETS;?>LTE/plugins/toastr/toastr.min.css">

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="colorlib-load"></div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header_area animated">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Menu Area Start -->
                <div class="col-12 col-lg-10">
                    <div class="menu_area">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <!-- Logo -->
                            <a class="navbar-brand" href="accueil.html">FeedRed</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ca-navbar" aria-controls="ca-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                            <!-- Menu Area -->
                            <div class="collapse navbar-collapse" id="ca-navbar">
                                <ul class="navbar-nav ml-auto" id="nav">
                                    <li class="nav-item active"><a class="nav-link" href="#home">Accueil</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#about">A propos de nous</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#screenshot">Nos rédactions</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#pricing">Nos tarifs</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                                </ul>
                                <div class="sing-up-button d-lg-none">
                                    <a href="login.html">Connexion</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- Signup btn -->
                <div class="col-12 col-lg-2">
                    <div class="sing-up-button d-none d-lg-block">
                        <a href="login.html">Connexion</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Wellcome Area Start ***** -->
    <section class="wellcome_area clearfix" id="home">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-md">
                    <div class="wellcome-heading">
                        <h2>Par Feed Agency</h2>
                        <h3>F</h3>
                        <p class="text-md">
                            Besoin de contenus de qualité rapidement ? <br>
                            Faites-nous confiance et laissez-nous vous aider à atteindre vos objectifs !<br>
                        </p>
                    </div>
                    <div class="get-start-area">
                        <!-- Form Start -->
                        <form action="contacter.html" method="post" class="form-inline">
                            <input type="email" name="values[email]" style="color: white;" class="form-control email" placeholder="Votre adresse mail ici" required>
                            <input type="submit" class="submit" value="Envoyer">
                        </form>
                        <!-- Form End -->
                    </div>
                </div>
                <div id="logo"></div>
            </div>
        </div>
        <!-- Welcome thumb -->
        <div class="welcome-thumb wow fadeInDown" data-wow-delay="0.5s">
            <!-- <img src="img/bg-img/welcome-img.png" alt=""> -->
        </div>
    </section>
    <!-- ***** Wellcome Area End ***** -->

    <!-- ***** Special Area Start ***** -->
    <section class="special-area bg-white section_padding_100" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading Area -->
                    <div class="section-heading text-center">
                        <h2>Pourquoi choisir FeedRed</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Special Area -->
                <div class="col-12 col-md-4">
                    <div class="single-special text-center wow fadeInUp" data-wow-delay="0.2s">
                        <div class="single-icon">
                            <i class="ti-mobile" aria-hidden="true"></i>
                        </div>
                        <h4>Articles de qualité sur mesure</h4>
                        <p>Nous rédigeons des articles de qualité sur des thématiques variées, en suivant vos instructions à la lettre.</p>
                    </div>
                </div>
                <!-- Single Special Area -->
                <div class="col-12 col-md-4">
                    <div class="single-special text-center wow fadeInUp" data-wow-delay="0.6s">
                        <div class="single-icon">
                            <i class="ti-settings" aria-hidden="true"></i>
                        </div>
                        <h4>Rédaction en sous-traitance de qualité</h4>
                        <p>Pour les agences SEO et les détenteurs de plusieurs blogs, nous proposons la sous-traitance de tout votre contenu avec une garantie de qualité optimale. Notre équipe expérimentée prend en charge la rédaction de vos articles avec confiance.</p>
                    </div>
                </div>
                <!-- Single Special Area -->
                <div class="col-12 col-md-4">
                    <div class="single-special text-center wow fadeInUp" data-wow-delay="0.4s">
                        <div class="single-icon">
                            <i class="ti-ruler-pencil" aria-hidden="true"></i>
                        </div>
                        <h4>Délais de rédaction flexibles</h4>
                        <p>Nos délais de rédaction varient entre 5 heures et 24 heures en fonction du volume de votre commande. Pour les demandes urgentes de contenu, nous sommes en mesure de livrer plus de 25 articles par jour.</p>
                    </div>
                </div>
            </div>

        </div>
        <!-- Special Description Area -->
        <div class="special_description_area mt-150">
            <div class="container">
                <div class="row">    
                    <img src="<?= ASSETS;?>orlib/img/bg-img/top_point.png" width="100%" height="100%" alt="">
                    <div class="col-lg-6">
                        <div class="special_description_img">
                            <img src="<?= ASSETS;?>orlib/img/bg-img/svg/customer_slide.png" width="100%" height="100%" alt="">
                        </div>
                    </div>
                    <div class="col-5 col-lg-6 ml-xl-auto">
                        <div class="special_description_content">
                            <h2 class="mb-2">Le compte client !</h2>
                            <p class="text-md">
                                Notre offre de comptes clients vous offre une solution simple et efficace pour la rédaction de vos articles. En tant que client disposant d'un compte, vous bénéficiez d'un service de qualité supérieure avec des délais de rédaction plus courts et une attention personnalisée à chaque étape de votre projet. De plus, vous avez accès à une équipe d'experts en rédaction qui se tiennent à votre disposition pour vous conseiller et vous accompagner dans vos projets. N'hésitez plus, créez votre compte dès maintenant et profitez de tous les avantages que nous vous proposons !
                            </p>
                        </div>
                    </div>
                    <img src="<?= ASSETS;?>orlib/img/bg-img/avantages.png" width="100%" height="100%" alt="">
                </div>
                <div class="row">
                    <!-- Single Feature Start -->
                    <div class="col-12 col-sm-6 col-lg-2"></div>
                    <!-- Single Feature Start -->
                    <div class="col-12 col-sm-6 col-lg-8 text-center">
                        <div class="single-feature">
                            <!-- <h5>Le compte client</h5> -->
                            <p class="text-md">En tant que client disposant d'un compte, vous bénéficiez de nombreux avantages pour la rédaction de vos articles. Vous pouvez commander vos articles en quelques clics depuis votre compte, suivre l'avancement de votre projet en temps réel et être informé de l'avancement de votre projet à chaque étape. De plus, vous bénéficiez d'un service de qualité supérieure avec des délais de rédaction plus courts et une attention personnalisée à chaque étape de votre projet.</p>
                            <a href="page-produit.html" class="btn btn-danger text-md rounded-lg btn-md mt-3">En savoir plus...</a>
                        </div>
                    </div>
                    <!-- Single Feature Start -->
                    <div class="col-12 col-sm-6 col-lg-2"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Special Area End ***** -->

    <!-- ***** Awesome Features Start ***** -->
    <section class="awesome-feature-area bg-white section_padding_0_50 clearfix" id="features">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Heading Text -->
                    <div class="section-heading text-center">
                        <h2>Nos services complémentaires</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Feature Start -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature">
                        <i class="ti-user" aria-hidden="true"></i>
                        <h5>La mise en ligne selon les meilleurs standards </h5>
                        <p class="text-md">Nous vous aidons à mettre en place une stratégie de contenu pour monter votre site sur les recherches Google sur une requête.</p>
                    </div>
                </div>
                <!-- Single Feature Start -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature">
                        <i class="ti-pulse" aria-hidden="true"></i>
                        <h5>La proposition  de sujet intéressant pour votre blog </h5>
                        <p class="text-md">Nous pouvons vous aider à posséder un blog pour votre activité pour attirer des visiteurs sur votre site. Selon votre activité, nous créeront du contenu de bonne qualité pour attirer des visiteurs via les recherches Google.</p>
                    </div>
                </div>
                <!-- Single Feature Start -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature">
                        <i class="ti-dashboard" aria-hidden="true"></i>
                        <h5>La gestion deleguée</h5>
                        <p class="text-md">Nous intégrons directement vos articles sur votre site avec les images et les différentes optimisation SEO (Option facultative).</p>
                    </div>
                </div>
            </div>

            <!-- <div class="row">
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature">
                        <i class="ti-user" aria-hidden="true"></i>
                        <h5>Élaboration d’une stratégie SEO</h5>
                        <p class="text-md">Nous vous aidons à mettre en place une stratégie de contenu pour monter votre site sur les recherches Google sur une requête.</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature">
                        <i class="ti-pulse" aria-hidden="true"></i>
                        <h5>Création et Gestion de blog sur votre activité</h5>
                        <p class="text-md">Nous pouvons vous aider à posséder un blog pour votre activité pour attirer des visiteurs sur votre site. Selon votre activité, nous créeront du contenu de bonne qualité pour attirer des visiteurs via les recherches Google.</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature">
                        <i class="ti-dashboard" aria-hidden="true"></i>
                        <h5>Intégration d’article sur Wordpress</h5>
                        <p class="text-md">Nous intégrons directement vos articles sur votre site avec les images et les différentes optimisation SEO (Option facultative).</p>
                    </div>
                </div>
            </div> -->

        </div>
    </section>
    <!-- ***** Awesome Features End ***** -->

    <!-- ***** Video Area Start ***** -->
    <!-- <div class="video-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="video-area" style="background-image: url(img/bg-img/video.jpg);">
                        <div class="video-play-btn">
                            <a href="https://www.youtube.com/watch?v=f5BBJ4ySgpo" class="video_btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- ***** Video Area End ***** -->

    <!-- ***** Video Area Start ***** -->
    <div class="video-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="video-area" style="background-image: url(<?= ASSETS ?>orlib/img/bg-img/video.png);">
                        <div class="video-play-btn">
                            <a href="<?= ASSETS ?>video/vid.mp4" class="video_btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Video Area End ***** -->

    <!-- ***** Cool Facts Area Start ***** -->
    <section class="cool_facts_area clearfix">
        <div class="container">
            <div class="row">
                <!-- Single Cool Fact-->
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="single-cool-fact d-flex justify-content-center wow fadeInUp" data-wow-delay="0.2s">
                        <div class="counter-area">
                            <h3><span class="counter">+16000 </span></h3>
                        </div>
                        <div class="cool-facts-content">
                            <i class="ion-arrow-down-a"></i>
                            <p>ARTICLES <br> REDIGES</p>
                        </div>
                    </div>
                </div>
                <!-- Single Cool Fact-->
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="single-cool-fact d-flex justify-content-center wow fadeInUp" data-wow-delay="0.4s">
                        <div class="counter-area">
                            <h3><span class="counter">120</span></h3>
                        </div>
                        <div class="cool-facts-content">
                            <i class="ion-happy-outline"></i>
                            <p>CLIENTS <br> HEUREUX</p>
                        </div>
                    </div>
                </div>
                <!-- Single Cool Fact-->
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="single-cool-fact d-flex justify-content-center wow fadeInUp" data-wow-delay="0.6s">
                        <div class="counter-area">
                            <h3><span class="counter">80</span></h3>
                        </div>
                        <div class="cool-facts-content">
                            <i class="ion-person"></i>
                            <p>REDACTEURS <br>QUALIFIES</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Cool Facts Area End ***** -->

    <!-- ***** Cool Facts Area Start ***** -->
    <!-- <section class="our-monthly-membership section_padding_50 clearfix clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="single-cool-fact d-flex justify-content-center wow fadeInUp" data-wow-delay="0.2s">
                        <div class="counter-area">
                            <h3><span class="counter">+16000 </span></h3>
                        </div>
                        <div class="cool-facts-content">
                            <i class="ion-arrow-down-a"></i>
                            <p>ARTICLES <br> REDIGES</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="single-cool-fact d-flex justify-content-center wow fadeInUp" data-wow-delay="0.4s">
                        <div class="counter-area">
                            <h3><span class="counter">120</span></h3>
                        </div>
                        <div class="cool-facts-content">
                            <i class="ion-happy-outline"></i>
                            <p>CLIENTS <br> HEUREUX</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="single-cool-fact d-flex justify-content-center wow fadeInUp" data-wow-delay="0.6s">
                        <div class="counter-area">
                            <h3><span class="counter">80</span></h3>
                        </div>
                        <div class="cool-facts-content">
                            <i class="ion-person"></i>
                            <p>REDACTEURS <br>QUALIFIES</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- ***** Cool Facts Area End ***** -->

    <!-- ***** App Screenshots Area Start ***** -->
    <section class="app-screenshots-area bg-white section_padding_100 clearfix" id="screenshot">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <!-- Heading Text  -->
                    <div class="section-heading">
                        <h2>Nos rédactions</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <!-- Single Special Area -->
                <div class="col-12 col-md-4">
                    <div class="single-special wow fadeInDown" data-wow-delay="0.2s">
                        <h4>Aménagement du salon</h4>
                        <p>Le salon est la pièce représentant le cœur de la maison où la famille se retrouve et reçoit ses connaissances. Il ne doit pas donc être aménager...</p>
                        <button type="button" class="btn btn-primary mt-2 btn-sm" data-toggle="modal" data-target="#modal_red_1">Voir plus</button>
                    </div>
                </div>
                <!-- Single Special Area -->
                <div class="col-12 col-md-4">
                    <div class="single-special wow fadeInDown" data-wow-delay="0.6s">
                        <h4>Quels meilleurs manga à lire</h4>
                        <p>La communauté otaku s’accroît de jour en jour. Si vous êtes un nouveau fan de manga et d’Animé, il y a des mangas incontournables à lire absolument...</p>
                        <button type="button" class="btn btn-primary mt-2 btn-sm" data-toggle="modal" data-target="#modal_red_2">Voir plus</button>
                    </div>
                </div>
                <!-- Single Special Area -->
                <div class="col-12 col-md-4">
                    <div class="single-special wow fadeInDown" data-wow-delay="0.4s">
                        <h4>Top 5 des meilleures stations de ski en France</h4>
                        <p>La France est un pays touristique qui dispose de nombreux sites dont les meilleures altitudes favorables pour...</p>
                        <button type="button" class="btn btn-primary mt-2 btn-sm" data-toggle="modal" data-target="#modal_red_3">Voir plus</button>
                    </div>
                </div>
            </div>
            <!-- modals de rédactions -->
            <div class="modal fade" id="modal_red_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content rounded-0">
                        <div class="modal-header">
                            <h5 class="modal-title text-center w-100" id="exampleModalCenterTitle">Aménagement du salon</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><span class="icon-close2 text-dark"></span></span>
                            </button>
                        </div>
                        <div class="modal-body" style="background-color: #f1f1ff;">
                            <p>
                                <h4 style="margin-top:0cm"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Aménagement
                                d’un salon&nbsp;: conseils de pro</span></h4>

                                <p class="MsoNormal" style="text-align:justify;line-height:150%"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Le salon est la pièce
                                représentant le cœur de la maison où la famille se retrouve et reçoit ses
                                connaissances. Il ne doit pas donc être aménager à la légère. Il faut un agencement
                                qui est à la fois confortable, conviviale et très pratique pour un équilibre
                                parfait. Si vous manquez d’inspirations, voici quelques conseils pour aménager le
                                salon de votre choix comme un pro.</span></p>

                                <h5 style="margin-top:0cm"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Étudier avec soin l’orientation du salon</span></h5>

                                <p class="MsoNormal" style="text-align:justify;line-height:150%"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Avant de débuter l’aménagement de
                                votre salon, il est important de comprendre son plan. La forme de la pièce et
                                sa surface sont à prendre en compte pour se lancer. L’idéal serait un salon
                                rectangulaire avec une largeur d’au moins 3 mètres pour éviter l’impression
                                d’étroitesse. Mais vous pourrez vous adapter en fonction de votre salon car le
                                meilleur aménagement compose avec les soi-disant défauts d’une pièce.<span style="mso-spacerun:yes">&nbsp;&nbsp;&nbsp; </span></span></p>

                                <p class="MsoNormal" style="text-align:justify;line-height:150%"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">La contrainte des différentes
                                ouvertures n’est pas à négliger dans cette étude. Comme vous le savez, la position
                                de la porte et des fenêtres déterminera l’orientation de vos meubles.
                                L’objectif étant de ne pas contrer la clarté des lieux, il est préférable
                                d’investir les murs sans ouvertures. Néanmoins, vous pouvez enfreindre les
                                règles si c’est une pièce baignée de lumière ou avec plusieurs ouvertures.</span></p>

                                <h5 style="margin-top:0cm"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Prévoir
                                et organiser les rangements</span></h5>

                                <p class="MsoNormal" style="text-align:justify;line-height:150%"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">La plupart des professionnels
                                sont du même avis sur l’importance des rangements dans le salon. Ils
                                encouragent même le fait d’imaginer l’aménagement de ce dernier avant d’y installer
                                le moindre meuble. Cela permet d’éviter des meubles qui ont tendance à
                                encombrer les surfaces restreintes. Le résultat est plus réussi lorsque les
                                rangements imaginés prennent en compte l’espace aérien.</span></p>

                                <p class="MsoNormal" style="text-align:justify;line-height:150%"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Certains architectes d’intérieur
                                ont porté leurs choix sur les rangements en hauteur comme dans les bateaux car
                                la surface au sol est libérée. Si vous avez des objets n’ayant pas besoin
                                d’être à portée de main, le rangement en hauteur est une bonne alternative.
                                Sachez qu’il est plus adapté au salon de petite taille, au cas contraire libre
                                à vous de ranger selon votre goût.</span></p>

                                <h5 style="margin-top:0cm"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Prendre
                                le mobilier adapté au salon</span></h5>

                                <p class="MsoNormal" style="text-align:justify;line-height:150%"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Le mobilier doit être choisi en
                                fonctions des proportions du séjour pour éviter d’alourdir l’ambiance. La base
                                en parlant de mobilier est le trio canapé, table basse et télévision. Le
                                confort étant prioritaire pour la plupart, vous pouvez opter pour deux ou trois
                                fauteuils selon la configuration de votre salon. Aussi, si vous avez pour
                                habitude de recevoir beaucoup vous pourrez prendre les assises légères selon
                                vos priorités.</span></p>

                                <p class="MsoNormal" style="text-align:justify;line-height:150%"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Peu importe la superficie, placer
                                la télévision à toujours été une contrainte à tous les salons. La télé doit
                                idéalement être fixée à un mur de manière à ce qu’elle soit visible. La table
                                base doit être le point centrale du salon et autour d’elle seront disposé les
                                sièges. Il faudra aussi tenir compte du branchement électrique avant de
                                réellement passer à la disposition du mobilier que vous aurez choisi.</span></p>

                                <h5 style="margin-top:0cm"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Être attentif à l’éclairage de votre salon</span></h5>

                                <p class="MsoNormal" style="text-align:justify;line-height:150%"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">L’éclairage joue un rôle
                                déterminant car il influe sur notre perception de l’espace. Vous aurez à passer
                                différents moments dans votre salon, il serait donc bien d’avoir des ambiances
                                différentes. Un éclairage modulable est parfait avec une lumière vive pour les
                                discussions et une lumière tamisée pour les moments calmes. Vous pouvez utiliser
                                un éclairage bas ou à hauteur des yeux si le salon est petit.</span></p>

                                <p class="MsoNormal" style="text-align:justify;line-height:150%"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">En dehors du caractère modulable
                                de l’éclairage, la multiplicité des points lumineux est indispensable. Elle
                                permet d’harmoniser le salon et augmente la sensation d’espace. <span style="mso-spacerun:yes">&nbsp;</span>Mettre des points lumineux dans les quatre
                                coins de la pièce serait donc plus approprié afin de dessiner des zones.</span></p>

                                <h5 style="margin-top:0cm"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Jouer
                                avec les contrastes en matière de décoration</span></h5>

                                <p class="MsoNormal" style="text-align:justify;line-height:150%"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Afin de jouer sur la variété vous
                                pouvez utiliser les éléments de décoration comme les rideaux, les coussins et
                                autres. Utilisez pour le canapé et les fauteuils, les matières douces, mates et
                                sensuelles. Ainsi, leur aspect douillet pourra contraster avec les objets durs
                                et brillants comme les vases, les statues ou les cadres. </span></p>

                                <p class="MsoNormal" style="text-align:justify;line-height:150%"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Pour adoucir le sol vous pourrez
                                par exemple utiliser un tapis de laine. Côté déco, vous pouvez choisir des
                                couleurs soutenues même si elles sont souvent plébiscités car elles accentuent
                                la luminosité de certains espaces. Il faudra aussi jouer avec les revêtements
                                tantôt de ton clair tantôt foncé pour donné une impression de grandeur.</span></p>

                                <p class="MsoNormal" style="text-align:justify;line-height:150%"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Pour personnaliser votre déco,
                                vous pourrez repeindre les murs avec une nuance foncée pour apporté un peu de
                                profondeur. Lorsqu’il s’agit d’un salon pauvre en mètres carrés, travaillez sur
                                les lignes afin de créer des points de fuites et étirer les perspectives.</span></p>

                                <h5 style="margin-top:0cm"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Créer
                                plusieurs espaces dans votre salon</span></h5>

                                <p class="MsoNormal" style="text-align:justify;line-height:150%"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">L’utilisation de l’espace lors de
                                l’aménagement de votre salon requiert du tact. Il serait bien de créer un autre
                                espace que celui occupé par le trio canapé, table basse et télé. Un coin
                                lecture par exemple, serait adéquat avec un petit fauteuil à coté d’un
                                porte-magazines ou d’une bibliothèque.<span style="mso-spacerun:yes">&nbsp;
                                </span>Cela donne l’impression d’avoir un salon vivant et spacieux.</span></p>

                                <p class="MsoNormal" style="text-align:justify;line-height:150%"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Très souvent indispensable à la
                                maison, vous pouvez aussi penser à un espace pour votre bureau. Néanmoins il ne
                                doit pas envahir l’espace et peut être un peu caché ou avec des rangements
                                fermés. Cela vous évite de vous focaliser sur vos dossiers à tout bout de
                                champs.</span></p>

                                <p class="MsoNormal" style="text-align:justify;line-height:150%"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">La création de différents espaces
                                dans le salon vous permet d’avoir une circulation plus fluide et de positionner
                                avec soin vos meubles. Elle vous force à trouver un juste équilibre en évitant
                                d’encombrer l’espace avec un excès de meubles. Aussi, il ne faut pas fuir les
                                meubles et tombé dans un excès d’espace inexploité.</span></p>

                                <p class="MsoNormal" style="text-align:justify;line-height:150%"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Le salon est la pièce qui se
                                retrouve au croisement de la vie privée et la sphère publique d’où l’importance
                                d’un aménagement réussi. Pour harmoniser l’intérieur de votre salon à votre
                                goût il vous suffit de suivre certaines règles. Notamment prévoir les
                                rangements de préférence fermés en fonction de l’orientation du salon à
                                aménager. Porter son choix sur le mobilier adéquat et le bien le disposer sans
                                oublier de penser à un éclairage modulable. L’originalité de votre aménagement
                                dépend de vous mais tenez aussi compte de la circulation dans l’espace.</span></p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal_red_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content rounded-0">
                        <div class="modal-header">
                            <h5 class="modal-title text-center w-100" id="exampleModalCenterTitle">Quels meilleurs manga à lire</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><span class="icon-close2"></span></span>
                            </button>
                        </div>
                        <div class="modal-body" style="background-color: #f1f1ff;">
                            <p>
                                <h4 style="margin-left:0cm;text-indent:0cm;mso-list:l0 level1 lfo1">Quels bons
                                mangas à lire&nbsp;?</h4>
                                <p class="MsoNormal">La communauté otaku s’accroît de jour en jour. Si vous êtes
                                un nouveau fan de manga et d’Animé, il y a des mangas incontournables à lire
                                absolument. Voici une sélection des mangas que vous devez lire pour prendre vos
                                marques dans ce monde.</p>
                                <h5 style="margin-left:0cm;text-indent:0cm;mso-list:l0 level2 lfo1">Death Note</h5>

                                <p class="MsoNormal" style="margin-top:12.0pt">Le manga Death Note est une œuvre
                                terminée de Tsugumi Ota et Takeshi Obata. Il s’agit d’un manga scindé en 13
                                tomes qui fait partie des plus populaires au monde. </p>

                                <p class="MsoNormal" style="margin-top:12.0pt">Il raconte l’histoire de Light
                                Yagami, un jeune lycéen qui par un grand hasard tombe sur un carnet mystérieux
                                qu’il ramasse. Il découvre qu’il peut tuer n’importe qui en écrivant son nom et
                                son prénom dans ce carnet noir. Une fois que Light comprit que le carnet avait
                                réellement le pouvoir de donner la mort, il commence à l’utiliser pour tuer les
                                criminels de sa ville. Il devint une sorte de divinité populaire et se fera
                                appeler Kira par les populations. </p>

                                <p class="MsoNormal" style="margin-top:12.0pt">Cependant, à cause des nombreux
                                morts dont il devient coupable à cause de son utilisation du livre, il devient
                                le plus grand criminel du monde. Les organisations du monde entier
                                s’efforceront alors de trouver qui est l’homme qui se cache derrière le
                                pseudonyme de Kira. Principalement, un détective se démarque des autres, il est
                                connu sous le nom de code L. Démarre alors un duel d’intelligence entre ces
                                deux génies pour découvrir l’identité de l’autre en premier.</p>

                                <h5 style="margin-left:0cm;text-indent:0cm;mso-list:l0 level2 lfo1">Naruto</h5>

                                <p class="MsoNormal" style="margin-top:12.0pt">C’est le manga à lire par
                                excellence. Tout le monde en a déjà entendu parler au moins une fois dans sa
                                vie. Il s’agit d’une œuvre terminée de Masashi Kishimoto de 72 tomes. Il
                                raconte l’histoire de Naruto Uzumaki un jeune garçon qui nourrit l’espoir de
                                devenir le chef et le meilleur ninja de son village. Cependant, Naruto est un
                                cancre et un enfant méprisé de tous les villageois du village de Konoha. La
                                raison de ce mépris est que le jeune garçon a un démon renard malfaisant scellé
                                dans son corps. </p>

                                <p class="MsoNormal" style="margin-top:12.0pt">Cependant, Naruto ne se lasse pas
                                abattre et au fil du temps, il monte en puissance et fini par gagner la
                                confiance et l’admiration des villageois. Suivez son parcours jusqu’à l’âge
                                adulte et à la réalisation de son rêve. Le chemin sera bien évidemment semé
                                d’embûches. </p>

                                <h5 style="margin-left:0cm;text-indent:0cm;mso-list:l0 level2 lfo1">One piece</h5>

                                <p class="MsoBodyText">Si vous n’aimez pas les histoires longues, voire
                                interminables, vous n’aimerez certainement pas ce manga. Cependant, One Piece
                                fait partie des mangas les plus connus et appréciés de la culture otaku. Le
                                manga est une histoire en cours de Eiichiro Oda de 98 tomes en février 2021.
                                Elle raconte l’histoire de Luffy, un jeune homme dont le corps a des propriétés
                                semblables au caoutchouc. Il a acquis cette capacité en mangeant un fruit du
                                démon. Il est pirate et dispose d’un équipage appelé l’équipage du chapeau de
                                paille. Avec son équipage, Luffy explore le monde à la recherche d’un grand
                                trésor afin de devenir le Roi des Pirates. C’est le One Piece.</p>

                                <p class="MsoBodyText">Par ailleurs, si vous ne souhaitez pas lire ces mangas,
                                vous pouvez aussi suivre les adaptations animées.</p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal_red_3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content rounded-0">
                        <div class="modal-header">
                            <h5 class="modal-title text-center w-100" id="exampleModalCenterTitle">Top 5 des meilleurs stations de ski en France</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><span class="icon-close2"></span></span>
                            </button>
                        </div>
                        <div class="modal-body" style="background-color: #f1f1ff;">
                            <p>
                                <h4>Top 5 des meilleurs station de Ski en France</h4>

                                <p class="MsoNormal">La France est un pays touristique qui dispose de nombreux
                                sites dont les meilleures altitudes favorables pour le ski au monde. En effet,
                                les Alpes dont les sommets sont supérieurs à 4000m d’altitude sont juste une
                                parmi toutes les autres. Vous résidez en France et êtes passionné de ski&nbsp;?
                                Alors vous êtes sans nul doute à la recherche des meilleures stations où faire
                                du ski. Stations que cet article prend le soin de mettre à votre disposition.</p>

                                <h5>Val Thorens (Savoie-Aples)</h5>

                                <p class="MsoNormal">Cette station a été élue meilleure station durant quatre
                                années consécutives en 2019 aux World Ski Awards. Elle est la plus haute
                                station de ski d’Europe. Localisé dans le somptueux domaine des 3 Vallées, elle
                                se situe à 2300 mètres d’altitude. Ce qui fait d’elle, le plus grand domaine
                                skiable au monde. Val Thorens donne l’accès à 150 kilomètres, des pistes de ski
                                alpin et réparti en 68 pistes. Sa saison de ski dure assez souvent, ce qui fait
                                qu’elle ouvre ses portes tardivement comparativement aux autres stations. Pour
                                un adulte, le forfait en journée est d’environ 57,5 euros.</p>

                                <h5>Chamonix-Mont Blanc (Haute-Savoie)</h5>

                                <p class="MsoNormal">Certainement la plus légendaire des stations de ski en
                                France, Chamonix-Mont Blanc est lovée au pied de Toit de l’Europe. Elle a non
                                seulement le privilège de trôner au pied de l’un des plus hauts sommets, mais
                                aussi de quelques sites touristiques majeurs. Elle dispose de quatre domaines
                                skiables distincts qui la démarquent des autres stations. Au total, ce sont 150
                                kilomètres de pistes de ski alpin avec 102 pistes différentes. Elle atteint un
                                sommet de 3275 mètres d’altitude et est à également la réputation d’être la
                                station la plus écologique de France.</p>

                                <h5>La plagne – Les Arcs (Hautes-Aples)</h5>

                                <p class="MsoNormal">La plagne est la station la plus populaire située dans les
                                Aples du Sud avec un domaine immense. Elle est reliée aux Arcs par la Vanoise
                                Expresse qui est l’un des plus beaux téléphériques de France. Aussi elle
                                possède une grande capacité d’accueil et devient la station familiale par
                                excellence. En réalité, elle se répartit sur 10 stations distinctes en étages
                                compris entre 1250 et 2100 mètres d’altitude. En troisième position dans les
                                plus grands domaines skiables, elle offre 425km de pistes de ski alpin avec 258
                                pistes. Elle se nomme «&nbsp;Paradiski&nbsp;», comme pour dire le domaine idéal
                                pour un séjour au ski en famille.</p>

                                <h5>Megève (Haute-Savoie)</h5>

                                <p class="MsoNormal"><span style="mso-spacerun:yes">&nbsp;</span>Si nous voulons
                                savoir la plus belle station de ski en France, nous ne saurons citer autres que
                                Megève. Sa beauté est tel que les majestueux chalets en bois recouverts de
                                neige. Ainsi elle est autant attirante pour son charme que pour le sport
                                d’hiver. On peut dire sans hésiter que cette station offre un rendez-vous aux
                                élites du monde. Evasion Mont-Blanc est son domaine de ski et il s’étend sur
                                400 kilomètres puis comptes 185 pistes. Elle possède un restaurant en altitude
                                vous permettant de déguster des plats de la gastronomie régionale.</p>

                                <h5>Alpe d’Huez (Isère)</h5>

                                <p class="MsoNormal">Surnommée «&nbsp;île au soleil&nbsp;», cette station de ski
                                détient la plus longue piste noire au monde appelée «&nbsp;la légendaire piste
                                de Sarenne&nbsp;». Elle est située dans les massifs des Grandes rousses où on
                                peut compter 300 jours de soleil par an. Ce qui est favorable pour des vacances
                                paisibles. Elue meilleure station de ski en 2020, son domaine s’étend sur près
                                de 250 kilomètres avec 111 pistes. </p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ***** App Screenshots Area End *****====== -->

    <!-- ***** Pricing Plane Area Start *****==== -->
    <section class="pricing-plane-area section_padding_100_70 clearfix" id="pricing">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Heading Text  -->
                    <div class="section-heading text-center">
                        <h2>Nos tarifs</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>

            <div class="row no-gutters">
                <div class="col-0 col-md-1 col-lg-1"></div>
                <div class="col-12 col-md-6 col-lg-4">
                    <!-- Package Price  -->
                    <div class="single-price-plan text-center">
                        <!-- Package Text  -->
                        <div class="package-plan">
                            <h5>Compte client standard</h5>
                            <div class="ca-price d-flex justify-content-center">
                                <span></span>
                                <h4>1,25€ /100 mots</h4>
                            </div>
                        </div>
                        <div class="package-description">
                            <p>Rédaction</p>
                            <p>Correction</p>
                            <p>Livraison rapide</p>
                            <p>Suivi client</p>
                            <p>Relecture par content manager</p>
                        </div>
                        <!-- Plan Button  -->
                        <div class="plan-button">
                            <a href="#"> </a>
                        </div>
                    </div>
                </div>
                <div class="col-0 col-md-1 col-lg-2"></div>
                <div class="col-12 col-md-6 col-lg-4">
                    <!-- Package Price  -->
                    <div class="single-price-plan active text-center">
                        <!-- Package Text  -->
                        <div class="package-plan">
                            <h5>Gestion déléguée</h5>
                            <div class="ca-price d-flex justify-content-center">
                                <span></span>
                                <h4>1,75€ /100 mots</h4>
                            </div>
                        </div>
                        <div class="package-description">
                            <p>Formule standard</p>
                            <p>Publication</p>
                            <p>Préparation du brief</p>
                            <p>Gestion de blog</p>
                            <p>Apport client</p>
                        </div>
                        <!-- Plan Button  -->
                        <div class="plan-button">
                            <a href="#"> </a>
                        </div>
                    </div>
                </div>
                <div class="col-0 col-md-1 col-lg-2"></div>
            </div>
        </div>
    </section>
    <!-- ***** Pricing Plane Area End ***** -->

    <!-- ***** Client Feedback Area Start ***** -->
    <!-- <section class="clients-feedback-area bg-white section_padding_100 clearfix" id="testimonials">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="slider slider-for">

                        <div class="client-feedback-text text-center">
                            <div class="client">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <div class="client-description text-center">
                                <p>“ I use Colorlib for usability testing. It's great for taking images and making clickable image prototypes that do the job and save me the coding time and just the general hassle of hosting. ”</p>
                            </div>
                            <div class="star-icon text-center">
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                            </div>
                            <div class="client-name text-center">
                                <h5>Jennifer</h5>
                                <p>Developeur</p>
                            </div>
                        </div>
                        
                        <div class="client-feedback-text text-center">
                            <div class="client">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <div class="client-description text-center">
                                <p>“ I have been using it for a number of years. I use Colorlib for usability testing. It's great for taking images and making clickable image prototypes that do the job.”</p>
                            </div>
                            <div class="star-icon text-center">
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                            </div>
                            <div class="client-name text-center">
                                <h5>Helen</h5>
                                <p>Marketeur</p>
                            </div>
                        </div>
                        
                        <div class="client-feedback-text text-center">
                            <div class="client">
                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <div class="client-description text-center">
                                <p>“ I have been using it for a number of years. I use Colorlib for usability testing. It's great for taking images and making clickable image prototypes that do the job and save me the coding time and just the general hassle of hosting. ”</p>
                            </div>
                            <div class="star-icon text-center">
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                                <i class="ion-ios-star"></i>
                            </div>
                            <div class="client-name text-center">
                                <h5>Henry smith</h5>
                                <p>Developeur</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="slider slider-nav">
                        <div class="client-thumbnail">
                            <img src="<?= ASSETS;?>orlib/img/bg-img/client-2.jpg" alt="">
                        </div>
                        <div class="client-thumbnail">
                            <img src="<?= ASSETS;?>orlib/img/bg-img/client-1.jpg" alt="">
                        </div>
                        <div class="client-thumbnail">
                            <img src="<?= ASSETS;?>orlib/img/bg-img/client-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- ***** Client Feedback Area End ***** -->

    <!-- ***** CTA Area Start ***** -->
    <section class="our-monthly-membership section_padding_50 clearfix">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="membership-description">
                        <h2>Avec Feed Agency</h2>
                        <p>Votre satisfaction est 100% guarantie.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="get-started-button wow bounceInDown" data-wow-delay="0.5s">
                        <a style="padding-left: 10px; padding-right: 10px; color: red;" href="#contact">Contactez nous dès maintenant...</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** CTA Area End ***** -->

    <!-- ***** Contact Us Area Start ***** -->
    <section class="footer-contact-area section_padding_100 clearfix" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- Heading Text  -->
                    <div class="section-heading">
                        <h2>Contactez nous !</h2>
                        <div class="line-shape"></div>
                    </div>
                    <div class="footer-text">
                        <p>Notre équipe est à votre disposition pour tous vos besoins, et se fera le plaisir de vous répondre de plus vite possible !</p>
                    </div>
                    <!-- <div class="address-text">
                        <p><span>Address:</span> 40 Baria Sreet 133/2 NewYork City, US</p>
                    </div> -->
                    <div class="phone-text">
                        <p><span>Téléphone :</span> +299 96 42 91 16</p>
                    </div>
                    <div class="email-text">
                        <p><span>Email :</span> contact@feed-agency.com</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Form Start-->
                    <div class="contact_from">
                        <form action="contacter.html" method="post">
                            <!-- Message Input Area Start -->
                            <div class="contact_input_area">
                                <div class="row">
                                    <!-- Single Input Area Start -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="values[name]" id="name" placeholder="Votre nom *" required>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="values[email]" id="email" placeholder="Votre E-mail *" required>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea id="message" class="form-control" name="values[message]" cols="30" rows="4" placeholder="Votre message *" required></textarea>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-12">
                                        <button type="submit" class="btn submit-btn">Envoyer</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Message Input Area End -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Us Area End ***** -->

    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-social-icon text-center section_padding_70 clearfix">
        <!-- footer logo -->
        <div class="footer-text">
            <h2>FeedRed</h2>
        </div>
        <!-- social icon-->
        <div class="footer-social-icon">
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="active fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
        </div>
        <div class="footer-menu">
            <nav>
                <ul>
                    <li><a href="#about">A propos</a></li>
                    <!-- <li><a href="#">Terms &amp; Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li> -->
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
        <!-- Foooter Text-->
        <div class="copyright-text">
            <!-- ***** Removing this text is now allowed! This template is licensed under CC BY 3.0 ***** -->
            <p>Copyright ©2021 Feed Agency. Designed by <a href="https://kart-school.com" target="_blank">K'Art</a></p>
        </div>
    </footer>
    <!-- ***** Footer Area Start ***** -->

    <div class="modal fade" id="pub_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content rounded-0">
          <div class="modal-body p-0 m-0">
            <button type="button" style="position: fixed; top: 5px; left: 10px;" class="close text-white" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><span class="fa fa-times"></span></span>
            </button>
            <a href="page-produit.html" class="btn text-white font-weight-bold text-md w-50" style="position: fixed; bottom: 23%; left: 40px; background-color: #5e17ebb4;">
                Plus de détails
            </a>
            <a href="page-produit.html" class="btn text-white font-weight-bold text-md w-50" style="position: fixed; bottom: 16%; right: 80px; background-color: #5e17ebb4;">
                Demander maintenant
            </a>
            <img src="<?= ASSETS;?>orlib/img/pub-img/compte_client.png" alt="">
          </div>
        </div>
      </div>
    </div>

    <!-- Jquery-2.2.4 JS -->
    <script src="<?= ASSETS;?>orlib/js/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?= ASSETS;?>orlib/js/popper.min.js"></script>
    <!-- Bootstrap-4 Beta JS -->
    <script src="<?= ASSETS;?>orlib/js/bootstrap.min.js"></script>
    <!-- All Plugins JS -->
    <script src="<?= ASSETS;?>orlib/js/plugins.js"></script>
    <!-- Slick Slider Js-->
    <script src="<?= ASSETS;?>orlib/js/slick.min.js"></script>
    <!-- Footer Reveal JS -->
    <script src="<?= ASSETS;?>orlib/js/footer-reveal.min.js"></script>
    <!-- Active JS -->
    <script src="<?= ASSETS;?>orlib/js/active.js"></script>
    <!-- Sweetalert2 -->
    <script src="<?php echo ASSETS;?>LTE/package/dist/sweetalert2.all.min.js"></script>
    <!-- Toastr -->
    <script src="<?php echo ASSETS;?>LTE/plugins/toastr/toastr.min.js"></script>

    <script>
        $(function() {
            setTimeout(() => {
                $('#pub_modal').modal('show');
            }, 500000);
        })
    </script>

    <?php if(isset($_SESSION['contact_sended']) && !empty($_SESSION['contact_sended']) && $_SESSION['contact_sended'] == true): ?>
    <script>
        toastr.options = {
            'positionClass': 'toast-bottom-right'
        }
        toastr.success('Contact envoyé avec succès !')
    </script>
    <?php unset($_SESSION['contact_sended']); endif; ?>

    <script>
        var coll = document.getElementsByClassName("collapsibles");
        var i;
        
        for (i = 0; i < coll.length; i++) {
          coll[i].addEventListener("click", function() {
            this.classList.toggle("actives");
            var content = this.nextElementSibling;
            if (content.style.maxHeight){
              content.style.maxHeight = null;
            } else {
              content.style.maxHeight = content.scrollHeight + "px";
            } 
          });
        }
    </script>
</body>

</html>
