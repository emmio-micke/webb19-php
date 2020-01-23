<?php

class Product
{
    public function add($name, $description, $price)
    {
        // Control parameters and add product to db.
    }

    public function getProducts($noOfProducts)
    {
        // Get the number of products as an array
        return array_fill(0, $noOfProducts, 'Product');
    }
}
