<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>List products</title>
</head>
<body>
<?php

// Product class.
include_once '../classes/product.php';
$products_object = new \webb19api\Product();

// Check if querystring is set to look for id or number of products.
$no_of_products = $_GET['no'] ?? null;
$product_id = $_GET['id'] ?? null;

// Get products.
$products = null; // Change this to actually get the products.

// Print out all products in a table.
?>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>productCode</th>
            <th>productName</th>
            <th>productLine</th>
            <th>productScale</th>
            <th>productVendor</th>
            <th>productDescription</th>
            <th>quantityInStock</th>
            <th>buyPrice</th>
            <th>MSRP</th>
        </tr>
    </thead>
    <tbody>
<?php // Print out all the products. ?>
    </tbody>
</table>
</body>
</html>
