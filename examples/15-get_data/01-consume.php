<pre>
<?php

$url = 'http://api.icndb.com/jokes/random';
$file_content = file_get_contents($url);

// var_dump($file_content);

$value = json_decode($file_content);

var_dump($value->value->joke);
