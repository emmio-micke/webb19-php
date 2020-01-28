<pre>
<?php

// Set URL.
$url = 'http://jsonplaceholder.typicode.com/posts';

$obj = [
    'title' => 'Hello',
    'body' => 'World'
];
$data = json_encode($obj);

// Create a curl instance.
$ch = curl_init($url);

// Setup curl options.
// We want a POST request. This is a special case.
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

// This is the data we want to post.
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// We want curl to return whatever response we get from the server.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// We want to specify that we're sending JSON.
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

// Enable headers.
curl_setopt($ch, CURLOPT_HEADER, 1);

// Get only headers.
//curl_setopt($ch, CURLOPT_NOBODY, 1);

// Perform the request and get the response.
$response = curl_exec($ch);
curl_close($ch);

print_r($response);
