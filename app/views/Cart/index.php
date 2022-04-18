<html>
    <head>
            <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            
        <title>Cart</title>
    </head>
    <body>
        <div class='container'>
            <?php
                $this->view('subviews/navigation');
            ?>
            <br> <h1 class="text-center">Your Cart</h1> <br>

            <table class="table table-striped">
                <tr><th></th><th>Name</th><th>Quantity</th><th>Price</th><th>Action</th></tr>
                <?php
                $sum = 0; 
                    if($data != null){
                        foreach ($data as $order_detail) {
                            $product = new \app\models\Product();
                            $product = $product->get($order_detail->product_id);
                            echo " <tr><td><img alt = '' src = '\\pictures\\$product->product_image' width = 100 height = 100></td>
                                <td>$product->product_name</td><td>$order_detail->quantity</td><td>$$order_detail->price</td>
                                <td><a href='/Cart/deleteFromCart/$order_detail->order_detail_id' onclick='return confirm(\"Are you sure?\");' class='m-2'>Delete</a></td></tr>";
                            
                            $sum += $order_detail->price;     
                        }
                    }     
                ?>
                  <tr><th>Subtotal</th><th></th><th></th><th></th><th>$<?=$sum?></th></tr>
            </table>

            <?php if($data != null){ 
                echo "<a href='/Cart/clearCart/$order_detail->order_id' class='btn btn-success'> Clear Cart</a>
                <a href='/Order/orderPlace/$order_detail->order_id' class='btn btn-success'> Place Order</a>";
            }?>
            
        </div>
    </body>
</html>