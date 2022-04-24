<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
	<div class="collapse navbar-collapse" >
		<ul class="navbar-nav">
			<li class="nav-item active"><a class="nav-link" href='/Main/index'>Home</a></li>

			<?php
				if (!isset($_SESSION['user_id'])) {
					//registration
					echo "<li class= \"nav-item active\" >
					<a class= \"nav-link\" href='/User/register'>Register</a>
					</li>";
					//login
					echo "<li class= \"nav-item active\" >
							<a class= \"nav-link\" href='/User/login'>Log in</a>
							</li>";
				}else {
					if(!isset($_SESSION['store_id'])){
						echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/User/index/".$_SESSION['user_id']."'>My Profile</a></li>";
						echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/Order/userOrderHistory'>Order History</a></li>";
						echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/Cart/index'>Cart</a></li>";
						echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/User/logout'>Log out</a></li>";
					} else{
						echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/User/index/".$_SESSION['user_id']."'>My Profile</a></li>";
						echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/Order/storeOrderList'>Order List</a></li>";
						echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/Order/storeOrderHistory'>Order History</a></li>";
						echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/User/logout'>Log out</a></li>";
						
					}
				}
				 	
				$this->view('Search/index');
				?>
			
		</ul>
	</div>
</nav>

	<?php
		$searcher = new \app\controllers\Search();
		$type = filter_input(INPUT_POST, 'search_type');
		if ($type === "store")
			$searcher->searchStores();
		else if ($type === "product")
			$searcher->searchProducts();
	?>


