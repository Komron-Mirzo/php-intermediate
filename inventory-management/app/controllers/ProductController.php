<?php

 # Handle actions related to products (CRUD)
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product;
use App\Models\Category;
use App\Helpers\Sanitizer;
use App\Helpers\Pagination;
use App\Helpers\Debugger;


class ProductController extends BaseController
{
    public function index()
    {       
       


        // Get all paginated products
        $total_products_count = Product::getTotalProductCount();
        $current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1; 
        $pagination = new Pagination(10, $current_page);
        $total_page = $pagination->getPageTotal($total_products_count);
        $prev_page = $current_page > 1 ? $current_page - 1 : null;
        $next_page = $current_page < $total_page ? $current_page + 1 : null;
        $item_limit = $pagination->getItemPerPage();
        $item_offset = $pagination->getItemOffset();
         
        // Get all products for current page
        $products = Product::getAll($item_limit, $item_offset);


        // Delete product
        $delete_id = $_GET['delete_id'] ?? '';

        if (!empty($delete_id)) {
            Product::deleteProduct($delete_id);
    
            //Refresh page
            header('Location: ' . $_SERVER['REDIRECT_URL']);
            exit();
        }

        // Edit product
        $edit_id = $_GET['edit_id'] ?? '';




        
        ob_start(); 
        include __DIR__ . '/../views/product/index.php'; 
        $content = ob_get_clean(); 

        include __DIR__ . '/../views/layout/layout.php'; 
    }

    public function add()
    {

        // Get all categories for form category input field
        $categories = Category::getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = Sanitizer::sanitizeString($_POST['product_name']) ?? '';
            $description = Sanitizer::sanitizeString($_POST['product_description']) ?? '';
            $price = Sanitizer::sanitizeInt($_POST['product_price']) ?? '';
            $category_id = Sanitizer::sanitizeInt($_POST['product_category']) ?? '';

            if (!empty($name) && !empty($description) && !empty($price) && !empty($category_id) ) {
                Product::addProduct($name, $description, $price, $category_id);

                // Redirect back to the same page without query parameters
                $redirectURL = $_SERVER['REQUEST_URI'];
                $redirectURL = str_replace('/add', '', $redirectURL);
                header("Location: " . $redirectURL);
                exit; 
                
            }
            
        }


        ob_start(); 
        include __DIR__ . '/../views/product/add.php'; 
        $content = ob_get_clean(); 

        include __DIR__ . '/../views/layout/layout.php'; 
    }

    public function edit() {

        // Get all categories for Products
        $categories = Category::getAll();

        // Get Current Product
        $edit_id = $_GET['edit_id'] ?? '';

        if (!empty($edit_id)) {
            $current_product = Product::getCurrent($edit_id);
        }

        // Edit Product
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = Sanitizer::sanitizeString($_POST['product_name']) ?? '';
            $description = Sanitizer::sanitizeString($_POST['product_description']) ?? '';
            $price = Sanitizer::sanitizeInt($_POST['product_price']) ?? '';
            $category_id = Sanitizer::sanitizeInt($_POST['product_category']) ?? '';

            if (!empty($name) && !empty($description) && !empty($price) && !empty($category_id) ) {
                Product::editProduct($name, $description, $price, $category_id);

                // Redirect back to the same page without query parameters
                $redirectURL = $_SERVER['REQUEST_URI'];
                $redirectURL = str_replace('/edit', '', $redirectURL);
                header("Location: " . $redirectURL);
                exit; 
                
            }
            
        }

        

        ob_start(); 
        include __DIR__ . '/../views/product/edit.php'; 
        $content = ob_get_clean(); 

        include __DIR__ . '/../views/layout/layout.php'; 
    }
}


?>