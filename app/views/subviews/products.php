<h2 class = "text-center"><?=("Products:")?></h2><br><br>
<div class="row" style='text-align:center;'>
    <?php
        if ($data != null) {
            foreach ($data as $product) {
                echo "<div class='col-lg-3 d-flex align-items-stretch'>
                        <div class='card' style='width: 18rem;'>
                            <img class=\"card-img-top\" alt = '' src = '\\pictures\\$product->product_image' style = 'width:200px;height:200px;display:block;margin-left:auto;margin-right:auto;'> 
                            <div class='card-body'> 
                            <h5 class=\"card-title\"> <a href = '/Product/index/$product->product_id'>$product->product_name</a> </h5>
                            <h6 class=\"card-subtitle mb-2 text-muted\">" . _("Price") .": $$product->product_price</h6>
                            <p class=\"card-text\"> ". _("Description:") ." $product->product_description</p>";

                if (isset($_SESSION['store_id']) && $_SESSION['store_id'] == $product->store_id) {
                    echo "<a class=\"btn btn-primary\" href='/Product/update/$product->product_id' class='m-2'>". _("Update Product") ."</a><br><br>
                        <a class=\"btn btn-primary\" href='/Product/delete/$product->product_id' onclick='return confirm(\"". _("Product successfully deleted") ."\")' class='m-2'>". _("Delete Product") ."</a></div>
                        </div></div>";
    
                } else if ($product->product_availability == 1 && isset($_SESSION['order->store_id']) && $_SESSION['order->store_id'] != $product->store_id) {
    
                        echo "<a class='btn btn-primary' href='/Cart/addToCart/$product->product_id/$product->store_id' onclick='return confirm('". _("Your current cart will be cleared if you proceed. Are you sure?") ."')' class='m-2'> ". _("Add to Cart") ." </a>  </div></div>";
                } else {
                    if ($product->product_availability == 0) {
                        echo "<a class='btn btn-primary' onclick='return confirm('". _("Product is not available at the moment.") ."')' class='m-2'> ". _("Add to Cart") ."  </a></div></div></div>";
                    }
                    else {
                        echo "<a class=\"btn btn-primary\" href='/Cart/addToCart/$product->product_id/$product->store_id' onclick='return confirm('". _("Product successfully added to cart!") ." ')' class='m-2'> ". _("Add to Cart") ." </a> </div> </div></div>";
                    }
                }
            }
        }
        else {
            echo "<h3>No products have been added!</h3>";
        }
    ?>
</div>
 
