<?php

// echo '<pre>'; print_r($_GET['r']); exit;

session_start();
include_once('_config.php');
// session_start();
// ini_set('max_execution_time', '300');
// set_time_limit(300);
// ini_set('memory_limit', '128M');
// include_once('_config.php');où mettre cette ligne si je suis dans une classe php
// require_once 'vendor/autoload.php';

MyAutoload::start();

// echo '<pre>'; print_r($_SESSION);

//----------------------------------------------------------------------
if(isset($_COOKIE['users_login_email']) && !isset($_SESSION['email'])) {

    // echo '<pre>'; print_r($_COOKIE); exit;

    $logged_user = (new UsersManager())->getEmailUser($_COOKIE['users_login_email']);
    $tokken = (new UsersManager())->getLoginTokken($logged_user->getIdUser());

    //Get user from cookies, and set session variables
    if(isset($_COOKIE['users_login_tokken']) && $_COOKIE['users_login_tokken'] == $tokken) {
        $_SESSION["idUser"]= $logged_user->getIdUser();
        $_SESSION["email"]= $logged_user->getEmail();
        $_SESSION["nom"]= $logged_user->getNom();
        $_SESSION["prenom"]= $logged_user->getPrenom();
        $_SESSION["adresse"]= $logged_user->getAdresse();
        $_SESSION["telephone"]= $logged_user->getTelephone();
        $_SESSION["profil"]= $logged_user->getProfil();
    }
    
}
//---------------------------------------------------------------------------------------
if(isset($_SESSION['email'])) {
    $article_man = new ArticleManager();
    $list_article_pris = $article_man->findSetted();
    foreach($list_article_pris as $article) {
        if($article->getDateLimit() != "") {
            $secondes_restant = $article->getDateLimit() - time();
            // echo '<pre>'; print_r($secondes_restant); exit;
            if($secondes_restant <= 0) {
                $article_man->freeArticle(array(
                    'idArticle' => $article->getIdArticle(),
                    'idRedacteur' => $article->getRedacteur()
                ));
            }
        }
    }
}

if(isset($_GET['r'])) {
    $request = $_GET['r'];
    $router = new Router($request);
}
else {
    $request = $redirect = 'accueil.html';
    $router = new Router($request);
    $router->redirect($redirect, $request);
}

//Vérification de l'authentificatoin
if($request != 'login.html' && $request != 'log.html' && $request != 'accueil.html' && $request != 'page-produit.html' && $request != 'contacter.html' && !isset($_SESSION['email']) && !isset($_POST['make_auth'])) {
    // $redirect = 'login.html';
    // $router->redirect($redirect, $request);
} else if(($request == 'login.html' || $request == 'log.html') && isset($_SESSION['email'])) {
    $redirect = 'home.html';
    $router->redirect($redirect, $request);
}

//Gestion des droits d'accès
if(($request == 'article.html' || strpos($request, 'add-article.html') !== false || strpos($request, 'up-article.html') !== false || strpos($request, 'del-article.html') !== false) && ($_SESSION['profil'] == 3 || $_SESSION['profil'] == 4)) {
    $redirect = 'home.html';
    $router->redirect($redirect, $request);
}
else if(($request == 'users.html' || strpos($request, 'add-users.html') !== false || strpos($request, 'up-users.html') !== false || strpos($request, 'del-users.html') !==false || strpos($request, 'detail-users.html') !== false) && $_SESSION['profil'] != 1) {
    $redirect = 'home.html';
    $router->redirect($redirect, $request);
}
else if(($request == 'list-article.html' || $request == 'redaction.html' || $request == 'historique.html' || strpos($request, 'prendre-article.html') !== false || strpos($request, 'laisser-article.html') !== false || strpos($request, 'soumettre-redaction.html') !== false) && $_SESSION['profil'] != 3) {
    $redirect = 'home.html';
    $router->redirect($redirect, $request);

}else if(($request == 'redactionss.html' || strpos($request, 'valider-redaction.html') !== false || strpos($request, 'invalider-redaction.html') !== false || strpos($request, 'corriger-redaction.html') !== false) && $_SESSION['profil'] != 2) {
    $redirect = 'home.html';
    $router->redirect($redirect, $request);
}

$router->renderController();