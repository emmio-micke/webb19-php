<pre>
<?php

// Set URL.
$url = 'http://jsonplaceholder.typicode.com/posts/3';

$obj = [
    'title' => 'Hello',
    'body' => 'World'
];
$data = json_encode($obj);

// Create a curl instance.
$ch = curl_init($url);

// Setup curl options
// To set PUT we need to specify a custom request.
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

// This is the data we want to post.
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// We want curl to return whatever response we get from the server.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// We want to specify that we're sending JSON.
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

// Enable headers.
curl_setopt($ch, CURLOPT_HEADER, true);

// Perform the request and get the response.
$response = curl_exec($ch);
curl_close($ch);

print_r($response);
