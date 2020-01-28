<?php

session_start();

$host    = 'localhost';
$port    = 8889;
$db      = 'classicmodels';
$user    = 'root';
$pass    = 'root';
$charset = 'utf8mb4';
$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$valid_user = false;
if (isset($_GET['apikey'])) {
    // Check if apikey is valid.
    $apikey = filter_input(INPUT_GET, 'apikey', FILTER_SANITIZE_STRING);
    $sql = 'SELECT * FROM users WHERE apikey = :apikey';
    $statement->bindValue('apikey', $apikey, PDO::PARAM_STR);
    $statement = $this->db->prepare($sql);
    $data = $statement->execute();

    if ($data) {
        // Apikey is valid.
        $valid_user = true;
        $_SESSION['apikey'] = $apikey;
    }
}

if (!$valid_user) {
    http_response_code(401);
    exit;
}

// Everytime you make a request, update the stats.
// How many requests should each user be able to make during what time period?
