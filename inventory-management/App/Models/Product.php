<?php

 # Product model (interacts with the database for product data)
namespace App\Models;

use Config\Database;
use PDO;

 class Product {
    
    public static function getAll ($limit, $offset) {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare('SELECT products.name AS product_name, products.description, products.price, products.category_id, products.product_id, categories.name AS category_name
                              FROM products
                              INNER JOIN categories ON products.category_id = categories.category_id
                              ORDER BY products.product_id DESC
                              LIMIT :limit OFFSET :offset');
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public static function addProduct ($name, $description, $price, $category_id) {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare('INSERT INTO products (name, description, price, category_id, user_id)
                                VALUES (:name, :description, :price, :category_id, :user_id)');
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->execute();
    }

    public static function deleteProduct ($product_id) {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare('DELETE FROM products
                                WHERE product_id = :product_id');
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
    }

    public static function getCurrent ($product_id) {

        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare('SELECT * FROM products
                        WHERE product_id = :product_id');
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    public static function editProduct ($name, $description, $price, $category_id, $product_id) {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare('UPDATE products
                                SET name = :name, description = :description, price = :price, category_id = :category_id
                                WHERE product_id = :product_id');
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();

    }

    public static function getTotalProductCount () {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->query('SELECT COUNT(*) FROM products');
        $total = $stmt->fetchColumn();
        return $total;
    }

 }
 
?>