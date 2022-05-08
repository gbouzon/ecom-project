<html>
	<head>
		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<title><?= _("Add Product") ?></title>
	</head>
	<body>
		<div class='container' style='text-align:center;'>
			<?php
				$this->view('subviews/navigation');
			?>

			<h1><?= _("Add Product") ?></h1>
		
			<form method='post' action='' enctype = 'multipart/form-data'>
				<label class='form-label'><?= _("Product name:") ?><input type='text' name='product_name' class='form-control' required/></label> <br>
				<label class='form-label'><?= _("Product price:") ?><input type='double' name='product_price' class='form-control' required/></label> <br>
				<label class='form-label'><?= _("Product available:") ?>&ensp;<input id = 'checkboxproduct' type='checkbox' name='product_availability' class='form-check-input'/></label> <br>
				<label class='form-label'><?= _("Product description:") ?><textarea name='product_description' cols="80" class='form-control' ></textarea></label><br>

				<label class = 'form-label'><?= _("Product picture:") ?> 
                    <input type = 'file' name = 'product_image' class = 'form-control'></label><br><br>
				
				<input class = 'btn btn-primary' type="submit" name='action' value='<?= _("Add!") ?>' class='form-control' />
			</form>
			<?php
				if ($data)
					echo "<div class='alert alert-danger' role='alert'> $data</div>";
			?>
		</div>
	</body>
</html>