<div class="container-50 content">
<h1> <a href="<?php echo BASE_URL . 'public/' . 'products'; ?>"> <img  width="32" height="32" src="/php-intermediate/inventory-management/public/assets/images/back.png" /> </a> Add Product</h1>
        <form action="" method="post">
            <div class="form-field">
                <label for="product_name">Product name</label>
                <input type="text" name="product_name" id="product_name" required>
            </div>
            <div class="form-field">
                <label for="product_description">Description</label>
                <textarea name="product_description" id="product_description" rows="6" required></textarea>
            </div>
            <div class="form-field">
                <label for="product_price">Price</label>
                <input type="number" name="product_price" id="product_price" required>
            </div>
            <div class="form-field select">
                <label for="product_category">Product name</label>
                <select name="product_category" id="product_category" required>
                    <?php
                        foreach ($categories as $category) {
                            echo '<option value="' . $category['category_id'] . '">' . $category['name'] . '</option>';
                        }
                    ?>
                </select>
            </div>
            <input type="submit" value="Add Product">
        </form>
</div>