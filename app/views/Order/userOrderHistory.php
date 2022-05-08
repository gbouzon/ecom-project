<html>
	<head>
		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
			<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<title><?= _("Order History") ?></title>
	</head>
	<body>
		<div class='container' style = 'text-align:center;'>
			<?php
				$this->view('subviews/navigation');
			?>

			<h1><?= _("Order History") ?></h1>
			<?php
                if ($data != null) {
                    foreach ($data as $order) {
                        echo "<br><div class='card'>
							  <div class='card-header'>";

						if ($order->order_status == 1) {
							echo "<h3><b>"._("Pending Order...")."</b></h3>";
							echo "<a href='/Order/userCancelOrder/$order->order_id' class='btn btn-outline-secondary'>"._("Cancel order")."</a>";
						} 
						else if($order->order_status == 2) 
							echo "<h3><b>"._("The store is preparing your order...")."</b></h3>";
						else if($order->order_status == 3) 
							echo "<h3><b>"._("Your order is ready to pick-up")."</b></h3>";
						else if($order->order_status == 4) 
							echo "<h3><b>"._("Completed Order")."</b></h3>";
						
                        echo "&ensp;<a href='/Order/viewOrderDetails/$order->store_id/$order->order_id/0' class='btn btn-outline-secondary'>"._("Detail")."</a>
							</div>
							<div class='card-body'>
							<h6 class='card-subtitle mb-2 text-muted'>$order->store_name</h6>
							<p class='card-subtitle mb-2 text-muted'><i>$order->store_address</p></i>
							<h6> "._("Order at:") ." ". strftime("%d/%m/%g, %r ", strtotime($order->createAt))."</h6> 
                            <p> "._("Total:")." $ " . round($order->total,2) . "<p/>
							</div>
                        </div>";
                    }
                }
				else 
					echo "<h3>You have no orders</h3>";
            ?>
		</div>
	</body>
</html>