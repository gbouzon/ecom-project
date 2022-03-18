<h2>Products:</h2>
<!--  -->
    <ol>
        <?php
            foreach($data as $product) {
                echo "<div class='card m-2'>
                        <div class='card-body'>
                $product->product_name  
                
                <img alt = '' src = '/pictures/<?= $product->product_image ?>'> <br>
                Price: $$product->product_price <br>
                Description: $product->product_description <br> <br>";


                if (isset($_SESSION['store_id']) && $_SESSION['store_id'] == $product->store_id){
                    echo "<a href='/Product/update/$product->product_id' class='m-2'>Update</a>
                    <a href='/Product/delete/$product->product_id' onclick='return confirm(\"Are you sure?\");' class='m-2'>Delete</a></div>
                    </div>";
                } else{
                    echo "<a href='/Product/addToCart/$product->store_id' class='m-2'> Add to Cart </a> <br>
                    </div>
                    </div>";
                }
            }
        ?>
    </ol>