<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Read the incoming data
        $request_body = file_get_contents('php://input');

        // Set up the cURL request
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://hook.eu1.make.com/n3h7ryj1d5obcbec19hihadttk3jdrn8');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true); 
        curl_setopt($curl, CURLOPT_POSTFIELDS, $request_body);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));

        // Send the request
        $response = curl_exec($curl);
        curl_close($curl);

        // Construction de la réponse
        $response = json_encode([
            'status' => 'success',
            'message' => $response
        ]);

        // Return a response to acknowledge receipt of the data
        header('Content-Type: application/json');
        header('HTTP/1.1 200 OK');
        echo $response;
        exit;

    }