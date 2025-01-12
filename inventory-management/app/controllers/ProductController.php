<?php

 # Handle actions related to products (CRUD)
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product;


class ProductController extends BaseController
{
    public function index()
    {
        // Fetch products from the model
        $products = Product::getAll();

        
        ob_start(); 
        include __DIR__ . '/../views/product/index.php'; 
        $content = ob_get_clean(); 

        include __DIR__ . '/../views/layout/layout.php'; 
    }

    public function add()
    {
        // // Edit product logic
        // $product = Product::getById($id);

        // Render the edit view
        include __DIR__ . '/../views/product/add.php';
    }
}


?>