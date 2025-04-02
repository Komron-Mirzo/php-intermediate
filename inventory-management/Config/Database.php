<?php


# Database configuration (connect to MySQL, etc.)

namespace Config;

use PDO;
use PDOException;
use Exception;

class Database {

    private static $instance = null;  // Singleton instance
    private $conn;
    private $mysql;

    private function __construct() {
        // Fetch DB credentials from environment variables or config file
        $this->mysql = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
    }

    // Singleton pattern to ensure only one database connection instance
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        if ($this->conn === null) {
            try {
                $this->conn = new PDO($this->mysql, DB_USER, DB_PASS);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                $this->handleException($e);  // Log or rethrow exception
            }
        }
        return $this->conn;
    }

    // Handle exceptions (log them or rethrow a custom exception)
    private function handleException(PDOException $e) {
        
        // Optionally, rethrow the exception if you want to handle it elsewhere
        throw new Exception("Database connection failed: " . $e->getMessage());
    }

    // Close the connection explicitly if needed (optional, PHP will do it at the end)
    public function closeConnection() {
        $this->conn = null;
    }
}



?>

