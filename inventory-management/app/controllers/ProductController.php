<?php

 # Handle actions related to products (CRUD)

 // File: app/controllers/ProductController.php
namespace App\Controllers;

use App\Models\Product;

class ProductController
{
    public function index()
    {
        // Fetch products from the model
        $products = Product::getAll();

        // Render the product index view
        include __DIR__ . '/../views/product/index.php';  

        return $products;
    }

    public function edit($id)
    {
        // // Edit product logic
        // $product = Product::getById($id);

        // // Render the edit view
        // include __DIR__ . '/../views/product/edit.php';
    }
}


?>