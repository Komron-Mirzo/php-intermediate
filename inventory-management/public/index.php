<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../Config/Router.php';

$routes = require_once __DIR__ . '/../Config/Routes.php';


use Config\Router;

$router = new Router($routes);
$router->run();









/*

/inventory-management/
│
├── app/                       # Application-related files
│   ├── Controllers/           # Controllers (handle requests and manage views)
│   │   ├── ProductController.php   # Handles actions related to products (CRUD)
│   │   ├── CategoryController.php  # Handles actions related to categories
│   │   └── UserController.php      # Handles actions related to users (authentication, etc.)
│   │
│   ├── Models/                # Models (handle database interaction)
│   │   ├── Product.php         # Product model (interacts with the database for product data)
│   │   ├── Category.php        # Category model (interacts with the database for category data)
│   │   └── User.php            # User model (handles user data and authentication)
│   │
│   ├── Views/                 # Views (HTML templates)
│   │   ├── Product/            # Views related to product pages
│   │   │   ├── Index.php       # View to display the list of products
│   │   │   └── Edit.php        # View to edit a product
│   │   ├── Category/           # Views related to category pages
│   │   │   ├── Index.php       # View to display the list of categories
│   │   │   └── Create.php      # View to create a new category
│   │   ├── User/               # Views related to user (e.g., login, register)
│   │   │   ├── Login.php       # User login page
│   │   │   └── Register.php    # User registration page
│   │   ├── Layout/             # Base layout for common HTML structure
│   │   │   ├── Header.php      # Header section (e.g., navigation menu)
│   │   │   └── Footer.php      # Footer section (e.g., copyright)
│   │
│   ├── Helpers/                # Helper functions and utilities
│   │   ├── Debugger.php        # Debugging utilities
│   │   └── Sanitizer.php       # Input sanitization helper
│
├── public/                    # Publicly accessible files
│   ├── assets/                # External assets (CSS, JS, images)
│   │   ├── css/               # CSS files
│   │   │   └── style.css      # Main styles
│   │   ├── js/                # JavaScript files
│   │   │   └── script.js      # Main JavaScript functionality
│   │   └── images/            # Image files
│   │       └── logo.png       # Example logo
│   ├── index.php              # Entry point for all requests (front controller)
│   └── .htaccess              # URL routing configuration (handles routing for SEO, URL rewriting)
│
├── config/                    # Configuration files
│   ├── Database.php           # Database configuration (connect to MySQL, etc.)
│   ├── Config.php             # General app configuration (app settings like timezone, environment, etc.)
│   └── Routes.php             # Define URL routes for controllers and actions
│
└── .gitignore                 # Git ignore file (files/folders to be ignored by version control)


*/
?>