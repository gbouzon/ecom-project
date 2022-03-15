<ul>
	<div style = "position:absolute;top:100px;left:50px;"> 
		<li><a href='/Main/index'>Home Page</a></li>

		<?php
			if (!isset($_SESSION['user_id'])) {
				echo "<li><a href='/User/login'>Log in</a></li>";
			}
			else if (!isset($_SESSION['profile_id'])) {
				echo "<li><a href='/Profile/create'>Create Profile</a></li>";
				echo "<li><a href='/User/logout'>Log out</a></li>";
			}
			else { 
				//getting profile id from current user
				$myUser = new \app\models\User();
				$myUser = $myUser->getById($_SESSION['user_id']);
				$profile = $myUser->getUserProfile($myUser->user_id);
				echo "<li>My Profile:
						<a href='/Profile/index/$profile->profile_id'>view</a> | 
						<a href='/Profile/update/$profile->profile_id'>update</a>
					</li>";
				echo "<li><a href='/Publication/create/$profile->profile_id'>Create Publication</a></li>";
				echo "<li><a href='/User/logout'>Log out</a></li>";
			}	
		?>
	</div>
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
