<h2>Products:</h2>
    <ol>
        <?php
            foreach($data as $product) {
                echo "$product->product_name <br>
                <img alt = '' src = '/pictures/<?= $product->product_image ?>'> <br>
                Price: $$product->product_price <br>
                Description: $product->product_description <br> <br>";


               // echo "<li><a href = '/Product/index/$product->product_id'>$product->product_name</a></li>";
            }
        ?>
    </ol>