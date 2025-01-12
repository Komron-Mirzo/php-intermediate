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

        $query = $conn->query('SELECT * FROM products');
        $products = $query->fetchAll(PDO::FETCH_ASSOC);

        return $products;
        

    }
 }
 
?>