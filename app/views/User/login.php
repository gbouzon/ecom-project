<html>
	<head>
			<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
			<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<title><?=_("login")?></title>
	</head>
	<body>
		<div class='container' style='text-align:center;'>
			<?php
				$this->view('subviews/navigation');
			?>
			<h1><?=_("Log into your user account")?></h1>
			<form method='post' action=''>
				<label class='form-label'><?=_("Email:")?><input type='text' name='email' class='form-control' /></label><br>
				<label class='form-label'><?=_("Password:")?><input type='password' name='password' class='form-control' /></label><br><br>
				<input class = 'btn btn-primary' type="submit" name='action' value='Login!' class='form-control' /><br> <br>
			</form>
			<?=_("No account?")?> <a href="/User/register"><?=_("Register here.")?></a> <br>
			<?php
				if($data)
					echo "<div class='alert alert-danger' role='alert'> $data</div>";
			?>	
		</div>
	</body>
</html>