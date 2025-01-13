<?php

# Category model (interacts with the database for category data)
namespace App\Models;

use Config\Database;
use PDO;

class Category {

    public static function add ($name, $description) {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare('INSERT INTO categories (name, description, user_id)
                               VALUES (:name, :description, :user_id);'); 
               
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->execute();
    }

    public static function getAll () {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare('SELECT * FROM categories'); 
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


 }


?>