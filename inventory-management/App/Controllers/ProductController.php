<?php

 # Handle actions related to products (CRUD)
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product;
use App\Models\Category;
use App\Helpers\Sanitizer;


class ProductController extends BaseController
{
    
   public function index()
    {       
       
        $pagination_data = $this->getAllProducts(10);
        $products = $pagination_data['products'];
        $pagination = $pagination_data['pagination'];

        $item_offset = $pagination['item_offset'];
        $total_page = $pagination['total_page'];
        $current_page = $pagination['current_page'];
        $prev_page = $pagination['prev_page'];
        $next_page = $pagination['next_page'];

        // Delete product
        $delete_id = $_GET['delete_id'] ?? '';

        $query = $_GET;
        $query['page'] =  $query['page'] ?? 1;
        $query_edit = $query;
        $query_edit['edit_id'] = $query['edit_id'] ?? '';
        $query_delete = $query;
        $query_delete['delete_id'] = $query['delete_id'] ?? '';

     

        if (!empty($delete_id)) {
            Product::deleteProduct($delete_id);

            $query = $_GET;
            $query['page'] =  $query['page'] ?? 1;
            unset($query['delete_id']);
            $redirect_string = http_build_query($query);

            
            //Refresh page
            header('Location: ' . 'products?'  . $redirect_string);
            exit();
        }

        $categories = Category::getAll();

        
        ob_start(); 
        include __DIR__ . '/../Views/Product/Index.php'; 
        $content = ob_get_clean(); 

        include __DIR__ . '/../Views/Layout/Layout.php'; 

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
        include __DIR__ . '/../Views/Product/Add.php'; 
        $content = ob_get_clean(); 

        include __DIR__ . '/../Views/Layout/Layout.php'; 
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
                Product::editProduct($name, $description, $price, $category_id, $edit_id);

                // Redirect back to the same page without query parameters
                $redirectURL = $_SERVER['REQUEST_URI'];
                $redirectURL = str_replace('/edit', '', $redirectURL);
                header("Location: " . $redirectURL);
                exit; 
                
            }
            
        }

        

        ob_start(); 
        include __DIR__ . '/../Views/Product/Edit.php'; 
        $content = ob_get_clean(); 

        include __DIR__ . '/../Views/Layout/Layout.php'; 
    }
}


?>