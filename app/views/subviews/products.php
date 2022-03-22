<h2 class = "text-center">Products:</h2>
    <?php
        foreach ($data as $product) {
            echo "<div class='card'>
            <img class=\"card-img-top\" alt = '' src = 'ecom\\ecom-project\\app\\pictures\\<?= $product->product_image?>' width = 100 height = 100> 
                    <div class='card-body'> 
                    <h5 class=\"card-title\"> <a href = '/Product/index/$product->product_id'>$product->product_name</a> </h5>
                   <h6 class=\"card-subtitle mb-2 text-muted\"> Price: $$product->product_price</h6>
                   <br> <br>
                   <p class=\"card-text\"> Description: $product->product_description</p>";

            if (isset($_SESSION['store_id']) && $_SESSION['store_id'] == $product->store_id) {
                echo "<a class=\"btn btn-primary\" href='/Product/update/$product->product_id' class='m-2'>Update</a>
                    <a class=\"btn btn-primary\" href='/Product/delete/$product->product_id' onclick='return confirm(\"Are you sure?\");' class='m-2'>Delete</a></div>
                    </div>";
            } else if(isset($_SESSION['order->store_id'])  && $_SESSION['order->store_id'] != $product->store_id) {
                echo "<a class=\"btn btn-primary\" href='/Cart/addToCart/$product->product_id/$product->store_id' onclick='return confirm(\"Your Cart will be clear if u want to add this product. Are u sure?\")' class='m-2'> Add to Cart </a> 
                    </div>
                    </div>";
            } else {
                echo "<a class=\"btn btn-primary\" href='/Cart/addToCart/$product->product_id/$product->store_id' class='m-2'> Add to Cart </a> 
                    </div>
                    </div>";
            }
        }
    ?>
 
