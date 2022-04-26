<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
	<div class="collapse navbar-collapse" >
		<ul class="navbar-nav">
			<li class="nav-item active"><a class="nav-link" href='/Main/index'><?=_("Home")?></a></li>
			<?php
				if (!isset($_SESSION['user_id'])) {
					//registration
					echo "<li class= \"nav-item active\" ><a class= \"nav-link\" href='/User/register'>" . _("Register") ."</a></li>";
					//login
					echo "<li class= \"nav-item active\" ><a class= \"nav-link\" href='/User/login'>" . _("Log in") ."</a></li>";
				}else {
					if(!isset($_SESSION['store_id'])){
						echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/User/index/".$_SESSION['user_id']."'>" . _("My Profile") ."</a></li>";
						echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/Order/userOrderHistory'>" . _("History") ." </a></li>";
						echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/Cart/index'>" . _("Cart") ."</a></li>";
						echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/User/logout'>" . _("Log out") ."</a></li>";
					} else{
						echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/User/index/".$_SESSION['user_id']."'>" . _("My Profile") ."</a></li>";
						echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/Order/storeOrderList'>" . _("Order List") ."</a></li>";
						echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/Order/storeOrderHistory'>" . _("Order History") ."</a></li>";
						echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/User/logout'>" . _("Log out") ."</a></li>";
					}
				}
				
				global $localizations;
				foreach($localizations as $locale){
					 echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='?lang=$locale'>". \Locale::getDisplayName($locale, $locale)." </a></li><br>";
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


