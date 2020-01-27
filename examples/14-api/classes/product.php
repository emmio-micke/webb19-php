<?php

namespace webb19api;

include_once 'db.php';

use \PDO;

class Product
{
    private $db;

    public function __construct()
    {
        $obj = new DB();
        $this->db = $obj->pdo;
    }

    public function createProduct($data)
    {
        // Setup query.
        $sql = 'INSERT INTO products (productCode, productName, productLine, ' .
            'productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP) ' .
            'VALUES (:productCode, :productName, :productLine, :productScale, ' .
            ':productVendor, :productDescription, :quantityInStock, :buyPrice, :MSRP)';

        // Prepare query.
        $statement = $this->db->prepare($sql);

        // Bind values.
        $statement->bindValue('productCode', filter_var($data->productCode, FILTER_SANITIZE_STRING));
        $statement->bindValue('productName', filter_var($data->productName, FILTER_SANITIZE_STRING));
        $statement->bindValue('productLine', filter_var($data->productLine, FILTER_SANITIZE_STRING));
        $statement->bindValue('productScale', filter_var($data->productScale, FILTER_SANITIZE_STRING));
        $statement->bindValue('productVendor', filter_var($data->productVendor, FILTER_SANITIZE_STRING));
        $statement->bindValue('productDescription', filter_var($data->productDescription, FILTER_SANITIZE_STRING));
        $statement->bindValue('quantityInStock', filter_var($data->quantityInStock, FILTER_SANITIZE_STRING));
        $statement->bindValue('buyPrice', filter_var($data->buyPrice, FILTER_SANITIZE_STRING));
        $statement->bindValue('MSRP', filter_var($data->MSRP, FILTER_SANITIZE_STRING));

        // Execute query and return result.
        return $statement->execute();
    }

    public function deleteProduct($id)
    {
        // Check if product exists.
        if (is_null($id) || !$this->getProducts($id)) {
            return false;
        }

        // Setup query.
        $sql = 'DELETE FROM products WHERE productCode = :id';

        // Prepare query.
        $statement = $this->db->prepare($sql);

        // Bind values.
        $statement->bindValue('id', filter_var($id, FILTER_SANITIZE_STRING));

        // Execute query and return result.
        return $statement->execute();
    }

    public function getProducts($id = null, $limit = null)
    {
        // Setup query.
        $sql = 'SELECT * FROM products';
        $parameters = null;

        if ($id !== null) {
            // If caller has provided id, then let's just look for that one product.
            $sql .= " WHERE productCode = :productcode ";
            $parameters = ['productcode' => $id];
        } elseif ($limit !== null) {
            // If caller want's to limit the number of products.
            $sql .= ' LIMIT ' . $limit;
        }

        $statement = $this->db->prepare($sql);
        $statement->execute($parameters);

        // Setup array to contain products.
        $products = [];

        // Fetch is faster than fetchall.
        while ($row = $statement->fetch()) {
            // Extract $row['productCode'] to $productCode etc.
            extract($row);
    
            // Setup structure for product item.
            $product_item = [
                'productCode'        => $productCode,
                'productName'        => $productName,
                'productLine'        => $productLine,
                'productScale'       => $productScale,
                'productVendor'      => $productVendor,
                'productDescription' => $productDescription,
                'quantityInStock'    => $quantityInStock,
                'buyPrice'           => $buyPrice,
                'MSRP'               => $MSRP
            ];
    
            // Add product item to products array.
            array_push($products, $product_item);
        }

        return $products;
    }

    public function getSearchProducts($search, $fields = null)
    {
        // Add wildcards to search term.
        $search = "%$search%";

        // Default fields to search in.
        $fields = $fields ?? ['productName', 'productDescription'];

        $sql = "SELECT * FROM products ";

        // Add all selected fields to query.
        foreach ($fields as &$field) {
            $field .= ' LIKE :search ';
        }

        // Build WHERE term in sql query.
        $sql .= ' WHERE ' . join(' OR ', $fields);

        $statement = $this->db->prepare($sql);
        $statement->execute([':search' => $search]);

        // Setup array to contain products.
        $products = [];

        // Fetch is faster than fetchall.
        while ($row = $statement->fetch()) {
            // Extract $row['productCode'] to $productCode etc.
            extract($row);
    
            // Setup structure for product item.
            $product_item = [
                'productCode'        => $productCode,
                'productName'        => $productName,
                'productLine'        => $productLine,
                'productScale'       => $productScale,
                'productVendor'      => $productVendor,
                'productDescription' => $productDescription,
                'quantityInStock'    => $quantityInStock,
                'buyPrice'           => $buyPrice,
                'MSRP'               => $MSRP
            ];

            // Add product item to products array.
            array_push($products, $product_item);
        }

        return $products;
    }

    public function updateProduct($id, $data)
    {
        // Check if product exists.
        if (is_null($id) || !$this->getProducts($id)) {
            return false;
        }

        // Setup query.
        $sql = 'UPDATE products SET
            productCode = :productCode,
            productName = :productName,
            productLine = :productLine,
            productScale = :productScale,
            productVendor = :productVendor,
            productDescription = :productDescription,
            quantityInStock = :quantityInStock,
            buyPrice = :buyPrice,
            MSRP = :MSRP
            WHERE productCode = :id';

        // Prepare query.
        $statement = $this->db->prepare($sql);

        // Bind values.
        $statement->bindValue('productCode', filter_var($data->productCode, FILTER_SANITIZE_STRING));
        $statement->bindValue('productName', filter_var($data->productName, FILTER_SANITIZE_STRING));
        $statement->bindValue('productLine', filter_var($data->productLine, FILTER_SANITIZE_STRING));
        $statement->bindValue('productScale', filter_var($data->productScale, FILTER_SANITIZE_STRING));
        $statement->bindValue('productVendor', filter_var($data->productVendor, FILTER_SANITIZE_STRING));
        $statement->bindValue('productDescription', filter_var($data->productDescription, FILTER_SANITIZE_STRING));
        $statement->bindValue('quantityInStock', filter_var($data->quantityInStock, FILTER_SANITIZE_STRING));
        $statement->bindValue('buyPrice', filter_var($data->buyPrice, FILTER_SANITIZE_STRING));
        $statement->bindValue('MSRP', filter_var($data->MSRP, FILTER_SANITIZE_STRING));
        $statement->bindValue('id', filter_var($id, FILTER_SANITIZE_STRING));

        // Execute query and return result.
        return $statement->execute();
    }
}
