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
    $plan = htmlspecialchars($plan, ENT_QUOTES, 'UTF-8');

    // Vérification des données pour éviter les erreurs
    if(empty($titre) || empty($type) || empty($nbrMots) || empty($ton) || empty($style) || empty($plan)) {
        // Traitement des erreurs
        echo "Erreur: Les informations n'ont pas été fournies";
        exit();
    }

    $req = "Je souhaiterais que vous m'aidiez à rédiger un ".$type." de ".$nbrMots." mots sur le sujet ".$titre." en utilisant un style ".$style.", un ton ".$ton." et en t'inspirant du plan ".$plan.". 
        Pour cela, suivez les instructions suivantes :
        1- Fournir une rédaction incluant les titres des sections (<h2>).
        1- Fournir un résultat structuré avec les balises html <h2> pour les titres de section et <p> pour les autres blocs de texte)
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


