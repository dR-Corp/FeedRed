<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Read the incoming data
        $request_body = file_get_contents('php://input');

        // Perform a request to ChatGPT 
        $response = sendChatGPTRequest($request_body);

        // Return a response to acknowledge receipt of the data
        header('HTTP/1.1 200 OK');
        echo $response;
        exit;

    }

    function sendChatGPTRequest($data) {
        // Set up the request to ChatGPT
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.openai.com/v1/engines/text-davinci-003/completions');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        // Set the header with your API key
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer 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'
        ));

        // Send the request and receive the response
        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }
?>