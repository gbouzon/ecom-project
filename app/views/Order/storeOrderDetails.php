<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title>Order detail</title>
    </head>
    <body>
        <div class='container'>
        <?php
            $this->view('subviews/navigation');
        ?>

        <h1 style='text-align:center;'>Order Detail </h1>
                
        <br>
        <div class="row">
            <div class="col-sm-6">
                <div class='card'>
				    <div class='card-header'>
                        <h4>Client information</h4>  
				    </div>
				    <div class='card-body'>
                        <label class='form-label'><span style='font-size:110%;'>Name: </span><?= $data[1]->first_name ?> <?= $data[1]->middle_name ?> <?= $data[1]->last_name ?></label> </label><br>
                        <label class='form-label'><span style='font-size:110%;'>Email: </span><?= $data[1]->email ?></label><br>
                        <label class='form-label'><span style='font-size:110%;'>Phone number: </span><?= $data[1]->phone ?></label><br>
				    </div>
                </div>
            </div>
        </div>        

        <br>
        <h3>Purchase Items</h3>
        <table class="table table-striped">
            <tr><th></th><th>Name</th><th>Quantity</th><th>Price</th></tr>
            <?php
                foreach ($data[2] as $order_detail) {
                    $product = new \app\models\Product();
                    $product = $product->get($order_detail->product_id);
                    echo " <tr><td><img alt = '' src = '\\pictures\\$product->product_image' width = 100 height = 100></td>
                            <td>$product->product_name</td><td>$order_detail->quantity</td><td>$$product->product_price</td>
                            </tr>";
                }        
            ?>
            
            <tr><td>Subtotal</td><th></th><th></th><td> $<?=round($data[3]['subtotal'], 2)?></td></tr>
            <tr><td>TPS CA</td><th></th><th></th><td>$<?=round($data[3]['TPS'], 2)?></td></tr>
            <tr><td>TVQ QC</td><th></th><th></th><td>$<?=round($data[3]['TVQ'],2)?></td></tr>
            <tr><th>Total</th><th></th><th></th><th>$<?=round($data[3]['Total'],2)?></th></tr>
            </table>
        </div>
    </body>
</html>