<div style = "position:absolute;top:100px;right:140px;">
    <h2>Search Index</h2>
    <ol>
        <?php
        if ($data != null) {
            if (get_class($data[0]) == "app\models\Store") {
                foreach($data as $store) {    
                    echo "<div class='card '>
                            <div class='card-body'>
                                <h3 class='text-info'><b><a href='/Store/index/$store->store_id'>$store->store_name</a></b></h3>
                                <h6> $store->store_address</h6>
                                <p>$store->description<p/>
                            </div>
                        </div>";
                }
            }
            else if (get_class($data[0]) == "app\models\Product") {

                foreach($data as $product) {  
                    echo "<div class='card '>
                    <div class='card-body'>
                        <h3 class='text-info'><b><a href='/Product/index/$product->product_id'>$product->product_name</a></b></h3>
                        <h6> $$product->product_price</h6>
                        <p>$product->product_description<p/>
                    </div>
                </div>";  
                }
            }
        }
        else 
            echo "The search returned no results.";
        ?>
    </ol>
</div>