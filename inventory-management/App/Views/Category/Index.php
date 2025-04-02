<div class="category-main">
    <div class="category-left content">
        <h1>Add Category</h1>
        <form action="" method="post">
            <div class="form-field">
                <label for="category_name">Category name</label>
                <input type="text" name="category_name" id="category_name">
            </div>
            <div class="form-field">
                <label for="category_description">Category description</label>
                <textarea name="category_description" id="category_description" rows="6"></textarea>
            </div>
            <input type="submit" value="Add Category">
        </form>
    </div>
    <div class="category-right content">
        <table border="1">
            <tr>
                <th>No.</th>
                <th> Category name </th>
                <th> Category Description </th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
                <?php
                    foreach($categories as $index => $category) {
                        echo '<tr>';
                        echo '<td>';
                        echo $index +1;
                        echo '</td>';
                        echo '<td>';
                        echo $category['name'];
                        echo '</td>';
                        echo '<td>';
                        echo $category['description'];
                        echo '</td>';
                        echo '<td>';
                        echo '<a href=categories/edit?edit_id=' . $category['category_id'] . '>' . '<img width="20" height="20" src="/php-intermediate/inventory-management/public/assets/images/edit.png" />' . '</a>';
                        echo '</td>';
                        echo '<td>';
                        echo '<a href=?delete_id=' . $category['category_id'] . '>' . '<img width="24" height="24" src="/php-intermediate/inventory-management/public/assets/images/delete.png" />' . '</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                ?>
        </table>

        <?php include dirname(__DIR__, 1) . '/layout/pages.php';  ?>
       
    </div>
</div>

