<div class="category-main">
    <div class="container-50 category-left content">
        <h1> <a href="<?php echo BASE_URL . 'public/' . 'categories'; ?>"> <img  width="32" height="32" src="/php-intermediate/inventory-management/public/assets/images/back.png" /> </a> Edit Category</h1>
        <form action="" method="POST">
            <div class="form-field">
                <label for="category_name">Category name</label>
                <input type="text" name="category_name" id="category_name" value="<?php echo $currentCategory['name']?>">
            </div>
            <div class="form-field">
                <label for="category_description">Category description</label>
                <textarea name="category_description" id="category_description" rows="6"><?php echo $currentCategory['description']?></textarea>
            </div>
            <input type="submit" value="Edit Category">
        </form>
    </div>
</div>

