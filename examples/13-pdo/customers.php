<?php

require "connect.php";

$statement = $pdo->query('SELECT customerName, country FROM customers;');

while ($row = $statement->fetch()) {
    print_r($row);
}
