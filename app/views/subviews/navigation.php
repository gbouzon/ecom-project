
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
<div class="collapse navbar-collapse" >
	<ul class="navbar-nav">
		<!-- <div style = "position:absolute;top:100px;left:50px;">  -->
			<li class="nav-item active"><a class="nav-link" href='/Main/index'>Home Page</a></li>

			<?php
				if (!isset($_SESSION['user_id'])) {
					echo "<li class= \"nav-item active\" >
							<a class= \"nav-link\" href='/User/login'>Log in</a>
						 </li>";
				}
				else if (!isset($_SESSION['profile_id'])) {
					echo "<li class= \"nav-item active\">
							<a class= \"nav-link\" href='/Profile/create'>Create Profile</a>
						 </li>";
					echo "<li class= \"nav-item active\">
							<a class= \"nav-link\" href='/User/logout'>Log out</a>
						 </li>";
				}
				else { 
					//getting profile id from current user
					$myUser = new \app\models\User();
					$myUser = $myUser->getById($_SESSION['user_id']);
					$profile = $myUser->getUserProfile($myUser->user_id);
					echo "<li class=\"nav-item active\">My Profile:
							<a class= \"nav-link\" href='/Profile/index/$profile->profile_id'>view</a> | 
							<a class= \"nav-link\" href='/Profile/update/$profile->profile_id'>update</a>
						</li>";
					echo "<li class=\"nav-item active\" ><a class= \"nav-link\" href='/Publication/create/$profile->profile_id'>Create Publication</a></li>";
					echo "<li class=\"nav-item active\"><a class= \"nav-link\" href='/User/logout'>Log out</a></li>";
				}	
			?>
		<!-- </div> -->
		<?php
			$this->view('Search/index');
			$searcher = new \app\controllers\Search();
			$type = filter_input(INPUT_POST, 'search_type');
			if ($type === "title")
				$searcher->searchByTitle();
			else if ($type === "content")
				$searcher->searchByContent();
		?>
	</ul>
</div>
</nav>
