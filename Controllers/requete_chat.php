<?php

    $_POST = json_decode(file_get_contents('php://input'), true);
    // Récupération des données envoyées
    extract($_POST);

    // Nettoyage des données pour éviter les injections SQL
    $titre = htmlspecialchars($titre, ENT_QUOTES, 'UTF-8');
    $type = htmlspecialchars($type, ENT_QUOTES, 'UTF-8');
    $nbrMots = htmlspecialchars($nbrMots, ENT_QUOTES, 'UTF-8');
    $ton = htmlspecialchars($ton, ENT_QUOTES, 'UTF-8');
    $style = htmlspecialchars($style, ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');

    // Vérification des données pour éviter les erreurs
    if(empty($titre) || empty($type) || empty($nbrMots)) {
        // Traitement des erreurs
        echo "Erreur: Les informations n'ont pas été fournies";
        exit();
    }

    $req = "Je souhaiterais que vous m'aidiez à écrire le plan de rédaction d'un ".$type." de ".$nbrMots." mots sur le sujet ".$titre." en utilisant un style ".$style." et un ton ".$ton.". 
        Pour cela, suivez les instructions suivantes :
        1- Me fournir un plan de rédaction détaillé incluant les titres des sections (<h2>) et les sous-parties (<h3>).
        2- Tenir compte des titres précédents pour éviter la répétition en utilisant des termes professionnels et spécifiques au sujet.
        3- Vous baser sur des sources fiables et vérifier l'exactitude des informations.
        4- Inclure des exemples concrets et des études de cas pour renforcer l'article.
        5- Optimiser pour le SEO en utilisant des mots clés pertinents.
        6- Tenir compte de la structure de l'article pour qu'il soit facile à lire et agréable à parcourir pour les internautes.
        7- Vérifier l'orthographe et la grammaire de l'article avant de me le soumettre.
    ";

    // Préparation de la réponse
    $response = array(
        'titre' => $titre,
        'type' => $type,
        'nbrMots' => $nbrMots,
        'req' => $req
    );

    echo json_encode($response);
    exit();

?>


