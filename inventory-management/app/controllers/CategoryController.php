<?php

# Handle actions related to categories

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Category;
use App\Helpers\Sanitizer;

class CategoryController extends BaseController
{
    public function index()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = Sanitizer::sanitizeString($_POST['category_name']) ?? '';
            $description = Sanitizer::sanitizeString($_POST['category_description']) ?? '';

            if (!empty($name) && !empty($description)) {
                Category::add($name, $description);
            }
        }

        $categories = Category::getAll();


        

        ob_start(); 
        include __DIR__ . '/../views/category/index.php'; 
        $content = ob_get_clean(); 

        include __DIR__ . '/../views/layout/layout.php'; 
    }

}


?>