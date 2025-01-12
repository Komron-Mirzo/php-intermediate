<?php

# Handle actions related to categories

namespace App\Controllers;
use App\Controllers\BaseController;

class CategoryController extends BaseController
{
    public function index()
    {
        ob_start(); 
        include __DIR__ . '/../views/category/index.php'; 
        $content = ob_get_clean(); 

        include __DIR__ . '/../views/layout/layout.php'; 
    }

    public function edit()
    {
        echo "Edit category";
    }
}


?>