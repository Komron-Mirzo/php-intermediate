<?php

 # Product model (interacts with the database for product data)
namespace App\Models;

use Config\Database;
use App\Helpers\Debugger;
use PDO;

 class Product {
    public static function getAll () {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->query('SELECT * FROM products');
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
        
    }
 }
 
?>