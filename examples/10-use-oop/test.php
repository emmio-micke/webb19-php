<?php

include_once('classes/product.php');
include_once('classes/user.php');

// Page:
$product_obj = new Product();
$products = $product_obj->getProducts(9);

foreach ($products as $product) {
    // Print out product.
    echo $product;
}


// Page:
if ($userSentForm) {
    $user = new User();

    // Psuedo...
    $user->login(filter_input($username), filter_input($password));
}
