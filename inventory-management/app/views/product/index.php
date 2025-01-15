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
                        echo '<tr>';
                        echo '<td>';
                        echo $index +1;
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
                        echo '<a href=products/edit?edit_id=' . $product['product_id'] . '>' . '<img width="20" height="20" src="/php-intermediate/inventory-management/public/assets/images/edit.png" />' . '</a>';
                        echo '</td>';
                        echo '<td>';
                        echo '<a href=?delete_id=' . $product['product_id'] . '>' . '<img width="24" height="24" src="/php-intermediate/inventory-management/public/assets/images/delete.png" />' . '</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                ?>
        </table>

        <div class="pagination">
            
            <?php if ($prev_page): ?>
                <?php echo '<a href="?page=' . $prev_page . '">' . 'PREV' . '</a>'; ?>
            <?php else: ?>
                <a href="" class="disabled">PREV</a>
            <?php endif; ?>
            <div class="ul">
                <?php 
                    for ($i = 1; $i <= $total_page; $i++) {
                        $current_class = $current_page == $i ? 'current-page' : '';
                            
                        echo '<li class="page ' . $current_class . '">' . '<a href=?page=' . $i . '>' . $i . '</a>' .  '</li>';
                    }
                ?>
            </div>
            <?php if ($next_page): ?>
                <?php echo '<a href="?page=' . $next_page . '">' . 'NEXT' . '</a>'; ?>
            <?php else: ?>
                <a href="" class="disabled">NEXT</a>
            <?php endif; ?>
        </div>
</div>