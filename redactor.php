<?php

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the incoming data
    $data = file_get_contents('php://input');
    $data = json_decode($data);

    // Process the data as needed
    // $file = './redactor.json';
    // file_put_contents($file, $content);
    // $bdd = new PDO("mysql:host=localhost;dbname=feedred;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $bdd = new PDO("mysql:host=212.95.51.72;dbname=feedredcom_feedred;charset=utf8", "feedredcom_feedred", "147feedred159", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

    //Indiquer que l'article est en cours de rédaction
    $query = "UPDATE redaction SET red = :red, fichier = :fichier WHERE idRedaction = :idRedaction";
    $req = $bdd->prepare($query);
    $req->bindValue(':red', $data['redID'], PDO::PARAM_INT);
    $req->bindValue(':idRedaction', $data['text'], PDO::PARAM_STR);
    $req->bindValue(':fichier', $fichier_name, PDO::PARAM_STR);
    $req->execute();



    // Return a response to acknowledge receipt of the data
    header('HTTP/1.1 200 OK');
    echo 'Nouvel rédaction effectuée avec succès.';
    exit;
}

// Return an error if the request method is not POST
header('HTTP/1.1 400 Bad Request');
echo 'Error: Invalid request method.';
exit;


?>