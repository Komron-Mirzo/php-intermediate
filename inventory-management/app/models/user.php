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

    public static function getAllUsers () {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->query('SELECT * FROM users');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getAllUsersOffset ($limit, $offset) {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare('SELECT * FROM users
                                ORDER BY user_id DESC
                                LIMIT :limit OFFSET :offset');
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getAllUsersCount () {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->query('SELECT COUNT(*) FROM users');
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public static function getCurrentUser ($user_id) {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare('SELECT * FROM users WHERE user_id = :user_id LIMIT 1');
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getAllUserRoles () {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->query('SELECT DISTINCT role FROM users');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function editUserInfo ($username, $email, $role) {
        $db = Database::getInstance();
        $conn = $db->getConnection();

        $stmt = $conn->prepare('INSERT INTO users (username, password, email)
                               VALUES (:username, :role, :email);'); 
               
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }





 }


?>