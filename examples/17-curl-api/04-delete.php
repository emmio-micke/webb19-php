<pre>
<?php

// Set URL.
$url = 'http://jsonplaceholder.typicode.com/posts/3';

// Create a curl instance.
$ch = curl_init($url);

// Setup curl options
// To set DELETE we need to specify a custom request.
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');

// We want curl to return whatever response we get from the server.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Enable headers.
curl_setopt($ch, CURLOPT_HEADER, true);

// Perform the request and get the response.
$response = curl_exec($ch);
curl_close($ch);

print_r($response);
