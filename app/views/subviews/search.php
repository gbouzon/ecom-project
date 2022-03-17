<div style = "position:absolute;top:100px;right:140px;">
    <h2>Search Index</h2>
    <ol>
        <?php
        if ($data != null) {
            if (get_class($data[0]) == "app\models\Store") {
                foreach($data as $store) {    
                    echo "<li><a href = '/Store/index/$store->store_id'>$store->store_name</a></li>";
                }
            }
            else if (get_class($data[0]) == "app\models\Product") {
                foreach($data as $product) {    
                    echo "<li><a href = '/Product/index/$product->product_id'>$product->product_name</a></li>";
                }
            }
        }
        ?>
    </ol>
</div>