    <h1>Products</h1>

    <?php 

        foreach ($products as $product) {
            echo 'Product name: ' . $product['name'] . '<br>';
            echo 'Price: ' . $product['price'];
        }

    ?>