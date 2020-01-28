<pre>
<?php

// Set URL.
$url = 'http://jsonplaceholder.typicode.com/posts';
//$url = 'http://jsonplaceholder.typicode.com/posts/3';

// Create a curl instance.
$ch = curl_init($url);

// Setup curl options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Perform the request and get the response.
$response = curl_exec($ch);
curl_close($ch);

print_r($response);
