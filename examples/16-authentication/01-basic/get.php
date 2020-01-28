<?php

// Create a stream
$options = [
    'http' => [
        'method' => 'GET',
        'header' => 'Authorization: Basic ' . base64_encode('other:hemligt')
    ],
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false
    ]
];
  
$context = stream_context_create($options);

$url = 'https://webb19/16-authentication/01-basic/mypage.html';

// Open the file using the HTTP headers set above
$content = file_get_contents($url, false, $context);

var_dump($content);
