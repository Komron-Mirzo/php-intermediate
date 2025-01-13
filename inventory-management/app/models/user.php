<?php

# User model (handles user data and authentication)
namespace App\Models;

use Config\Database;
use App\Helpers\Debugger;
use PDO;

class User {

    public static function register ($username, $password, $email) {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare('INSERT INTO users (username, password, email)
                               VALUES (:username, :password, :email);'); 
               
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }

    public static function login ($email) {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare('SELECT * FROM users WHERE email = :email LIMIT 1'); 
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


 }


?>