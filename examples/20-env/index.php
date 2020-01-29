<?php

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$port = getenv('DB_PORT');
$port = $_ENV['DB_PORT'];
$port = $_SERVER['DB_PORT'];

var_dump($port);


// Skapa koppling till vår db

