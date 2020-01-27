<?php

// Allow any site to fetch this result.
header("Access-Control-Allow-Origin: *");

// Set header to let browser know to expect json instead of html.
header("Content-Type: application/json; charset=UTF-8");

// Setup POST to be the only acceptable way to contact this page.
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Product class.
include_once '../classes/product.php';
$products_object = new \webb19api\Product();

// Get the posted data.
$product_id = $_GET['id'] ?? null;
$product_data = json_decode(file_get_contents('php://input'));

// Setup response structure.
$response = [
    'results' => null
];

// Try to update product.
if ($products_object->updateProduct($product_id, $product_data)) {
    // Set a suitable response code.
    http_response_code(200);

    // Set a readable message.
    $response['info']['message'] = "Product updated!";

    // Add the newly created product to results.
    $response['results'] = $product_data;
} else {
    // Set a suitable response code.
    http_response_code(500);

    // Set a readable message.
    $response['info']['message'] = "Couldn't update product!";
}

// Format response.
// Same as last one.
echo json_encode($response);
