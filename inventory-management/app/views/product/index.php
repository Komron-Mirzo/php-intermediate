<div class="products content">
    <div class="products-top">
        <h1>Products</h1>
        <a href="products/add"><button>Add Product</button></a> 
    </div>
        <table border="1">
            <tr>
                <th>No.</th>
                <th> Product name </th>
                <th> Product Description </th>
                <th>Price</th>
                <th>Category</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
                <?php

                    foreach($products as $index => $product) {

                        $query_edit['edit_id'] = $product['product_id'];
                        $query_string_edit = http_build_query($query_edit);
                        $query_delete['delete_id'] = $product['product_id'];
                        $query_string_delete = http_build_query($query_delete);

                        echo '<tr>';
                        echo '<td>';
                        echo $item_offset + $index + 1;
                        echo '</td>';
                        echo '<td>';
                        echo $product['product_name'];
                        echo '</td>';
                        echo '<td>';
                        echo $product['description'];
                        echo '</td>';
                        echo '<td>';
                        echo '$' . floatval($product['price']);
                        echo '</td>';
                        echo '<td>';
                        echo $product['category_name'];
                        echo '</td>';
                        echo '<td>';
                        echo '<a href=products/edit?' . htmlspecialchars($query_string_edit, ENT_QUOTES) . '>' . '<img width="20" height="20" src="/php-intermediate/inventory-management/public/assets/images/edit.png" />' . '</a>';
                        echo '</td>';
                        echo '<td>';
                        echo '<a href=?' . htmlspecialchars($query_string_delete, ENT_QUOTES) . '>' . '<img width="24" height="24" src="/php-intermediate/inventory-management/public/assets/images/delete.png" />' . '</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                ?>
        </table>

        <?php include dirname(__DIR__, 1) . '/layout/pages.php';  ?>
</div>