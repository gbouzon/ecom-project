<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title>Profile update</title>
    </head>
    <body>
        <div class='container'>
        <?php
            $this->view('subviews/navigation');
        ?>

            <h1>Order Confirmation </h1>
            <form method='post' action='' enctype = 'multipart/form-data'>
                <p>Your personal information</p>
                <label class='form-label'>First name:<input  disabled type='text' name='first_name' class='form-control' value='<?= $data[1]->first_name ?>' /></label>
                <label class='form-label'>Middle name:<input  disabled type='text' name='middle_name' class='form-control' value='<?= $data[1]->middle_name ?>' /></label>
                <label class='form-label'>Last name:<input  disabled type='text' name='last_name' class='form-control' value='<?= $data[1]->last_name ?>' /></label> <br>
                <label class='form-label'>Email:<input  disabled type='text' name='email' class='form-control' value='<?= $data[1]->email ?>' /></label><br>
                <label class='form-label'>Phone number:<input disabled type='text' name='phone' class='form-control' value='<?= $data[1]->phone ?>' /></label><br>
                <input type="submit" name='edit' value='Edit' class='form-control' /> <br> <br>


                <p> Store information </p>
                <label class='form-label'>Store name:<input disabled type='text' name='store_name' class='form-control' value='<?= $data[0]->store_name?>' /></label><br>
                <label class='form-label'>Store address:<input disabled type='text' name='store_address' class='form-control' value='<?= $data[0]->store_address?>' /></label><br>
                <label class='form-label'>Store description:<textarea disabled name='description' cols="80" class='form-control'> <?= $data[0]->description?></textarea></label><br>

                <br><h3>Purchase Items</h3>
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



                <input type="submit" name='action' value='Confirm' class='form-control' />
            </form>
        </div>
    </body>
</html>