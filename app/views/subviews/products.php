<h2>Products:</h2>
<!--  -->
    <ol>
        <?php
            foreach($data as $product) {;
                echo "<div class='card m-2'>
                        <div class='card-body'>
                $product->product_name <br>
                <img alt = '' src = '/pictures/<?= $product->product_image ?>'> <br>
                Price: $$product->product_price <br>
                Description: $product->product_description <br> <br>


                
                <!-- TODO - IF statement -->
                <a href='/Product/update/$product->product_id' class='m-2'>Update</a>
                <a href='/Product/delete/$product->product_id' onclick='return confirm(\"Are you sure?\");' class='m-2'>Delete</a>
                </div>
                </div>";




               // echo "<li><a href = '/Product/index/$product->product_id'>$product->product_name</a></li>";
            }
        ?>
    </ol>