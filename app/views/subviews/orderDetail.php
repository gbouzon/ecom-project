<br>
<div class="row">
    <div class="col-sm-6">
        <div class='card'>
			<div class='card-header'>
                <h4><?=_("Your personal information")?></h4>  
			</div>
			<div class='card-body'>
                <label class='form-label'><span style='font-size:110%;'><?=_("Name:")?> </span><?= $data[1]->first_name ?> <?= $data[1]->middle_name ?> <?= $data[1]->last_name ?></label> </label><br>
                <label class='form-label'><span style='font-size:110%;'><?=_("Email:")?> </span><?= $data[1]->email ?></label><br>
                <label class='form-label'><span style='font-size:110%;'><?=_("Phone number:")?> </span><?= $data[1]->phone ?></label><br>
			</div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class='card'>
            <div class='card-header'>
                <h4><?=_("Store information")?></h4> 
			</div>
            <div class='card-body'>
                <label class='form-label'> <span style='font-size:110%;'><?=_("Store name:")?> </span> <?= $data[0]->store_name?></label><br>
                <label class='form-label'> <span style='font-size:110%;'><?=_("Store address:")?></span> <?= $data[0]->store_address?></label><br>
                <label class='form-label'><span style='font-size:110%;'><?=_("Store description:")?></span> <?= $data[0]->description?></label><br>
			</div>
        </div>
    </div>
</div>        
<br>
<h3><?=("Purchase Items")?></h3>
<table class="table table-striped">
    <tr><th></th><th><?=_("Name")?></th><th><?=_("Quantity")?></th><th><?=_("Price")?></th></tr>
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
