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
                        echo '</tr>';
                        
                    }
                ?>
        </table>
       
    </div>
</div>

