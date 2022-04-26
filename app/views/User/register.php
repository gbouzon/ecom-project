<html>
	<head>
		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
			<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
			<title><?=_("User registration")?></title>
	</head>
	<body>
		<div class='container' style='text-align:center;'>
			<?php
				$this->view('subviews/navigation');
			?>

			<h1><?=_("Register your user account")?></h1>
		
			<form method='post' action='' enctype = 'multipart/form-data'>
				<label class='form-label'><?=_("First name:")?><input type='text' name='first_name' class='form-control'  required/></label>
				<label class='form-label'><?=_("Middle name:")?><input type='text' name='middle_name' class='form-control' /></label>
				<label class='form-label'><?=_("Last name:")?><input type='text' name='last_name' class='form-control'  required/></label> <br>
				<label class='form-label'><?=_("Email:")?><input type='email' name='email' class='form-control'  required/></label><br>
				<label class='form-label'><?=_("Phone Number:")?><input type='text' name='phone' class='form-control' /></label><br>
				<label class='form-label'><?=_("Password:")?><input type='password' name='password' class='form-control'  required/></label><br>
				<label class='form-label'><?=_("Password confirmation:")?><input type='password' name='password_confirm' class='form-control'  required /></label><br>

				<input class="form-check-input" type="radio" name="user_type" value="0" checked ><label class="form-check-label"><?=_("Customer")?></label>	

				<input class="form-check-input" type="radio" name="user_type" value="1"><label class="form-check-label" ><?=_("Store")?></label> <br>

				<label class = 'form-label'><?=_("Profile picture")?><input type = 'file' name= 'picture' class = 'form-control'></label><br>
				
				
				<input type="submit" name='action' value='<?=_("Register!")?>' class='form-control' />
			</form>
			<?php
				if ($data)
					echo "<div class='alert alert-danger' role='alert'> $data</div>";
			?>	
		</div>
	</body>
</html>