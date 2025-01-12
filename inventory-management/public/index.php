<?php

require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../config/router.php';

$routes = require_once __DIR__ . '/../config/routes.php';


use Config\Router;

$router = new Router($routes);
$router->run();







/*
/inventory-management/
│
├── app/                       # Application-related files
│   ├── controllers/           # Controllers (handle requests and manage views)
│   │   ├── ProductController.php    # Handle actions related to products (CRUD)
│   │   ├── CategoryController.php   # Handle actions related to categories
│   │   └── UserController.php      # Handle actions related to users (authentication, etc.)
│   │
│   ├── models/                # Models (handle database interaction)
│   │   ├── Product.php           # Product model (interacts with the database for product data)
│   │   ├── Category.php          # Category model (interacts with the database for category data)
│   │   └── User.php              # User model (handles user data and authentication)
│   │
│   ├── views/                 # Views (HTML templates)
│   │   ├── product/            # Views related to product pages
│   │   │   ├── index.php       # View to display list of products
│   │   │   └── edit.php        # View to edit a product
│   │   ├── category/           # Views related to category pages
│   │   │   ├── index.php       # View to display list of categories
│   │   │   └── create.php      # View to create a new category
│   │   ├── user/               # Views related to user (e.g., login, register)
│   │   │   ├── login.php       # User login page
│   │   │   └── register.php    # User registration page
│   │   └── layout/             # Base layout for common HTML structure
│   │       └── header.php      # Header section (e.g., navigation menu)
│   │       └── footer.php      # Footer section (e.g., copyright)
|   ├── helpers/
|   |       ├── debugger.php
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
│   ├── database.php           # Database configuration (connect to MySQL, etc.)
│   ├── config.php             # General app configuration (app settings like timezone, environment, etc.)
│   └── routes.php             # Define URL routes for controllers and actions
│
└── .gitignore                 # Git ignore file (files/folders to be ignored by version control)

*/
?>