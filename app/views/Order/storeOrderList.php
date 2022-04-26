<html>
	<head>
		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
			<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<title>Order List</title>
	</head>
	<body>
		<div class='container'>
			<?php
				$this->view('subviews/navigation');
			?>

			<h1 style='text-align:center;'>Order List</h1>
			<?php
                if($data != null){
                    foreach ($data[0] as $order){
                        echo "<br><div class='card'>
							  <div class='card-header'>
                                <h3><b>#Order $order->order_id</b></h3>
                                <h6> Order at: $order->createAt</h6>
                                ";
 
						if ($order->order_status == 1) {
                            // chose to accepte, decline
							echo "<a href='/Order/updateStatus/$order->order_id/2' class='btn btn-outline-success'>Accept order</a>&ensp;
                                <a href='/Order/updateStatus/$order->order_id/0' class='btn btn-outline-danger'>Decline order</a>";
						} else if ($order->order_status == 2) {
                            // finish order
							echo "<a href='/Order/updateStatus/$order->order_id/3' class='btn btn-outline-secondary'>Order is ready for pick-up</a>";
						} else if ($order->order_status == 3){
                            // client can come and pick up
							echo "<a href='/Order/updateStatus/$order->order_id/4' class='btn btn-outline-secondary'>Order was picked-up</a>";
						} else if ($order->order_status == 4){
                            // when the client pick up the order
							echo "<h6> Closed </h6>";
						}   
                        
                        echo "</div>
                        <div class='card-body'>
                        <h6>Client name: $order->first_name $order->middle_name $order->last_name</h6>
                        </div>
                        ";
                    
                        echo " <ul class='list-group list-group-flush'>";
                            foreach($data[1] as $products) {
                              
                                foreach ($products as $product) {
                                    if ($product->order_id == $order->order_id) {
                                        echo "<li class='list-group-item'> $product->quantity  $product->product_name</li>";
                                    }
                                }
                            }
                        echo "</ul>
                        
                        <div class='card-body'>
                        <p> <b>Total:</b> $ " . round($order->total,2) . "<p/>
                        <a href='/Order/viewOrderDetails/$order->user_id/$order->order_id/1' class='btn btn-outline-secondary'>Detail</a>
                        </div>
                        </div>";
                    }  
                }
                else {
                    echo "<h3>No pending orders.</h3>";
                }
            ?>
		</div>
	</body>
</html>