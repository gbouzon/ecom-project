<html>
	<head>
		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
			<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
			<title>Add Item</title>
	</head>
	<body>
		<div class='container'>
			<?php
				$this->view('subviews/navigation');
			?>

			<h1>Add an Item</h1>
		
			<form method='post' action='' enctype = 'multipart/form-data'>
				<label class='form-label'>Item name:<input type='text' name='product_name' class='form-control' /></label>
				<label class='form-label'>Item quantity:<input type='text' name='product_quantity' class='form-control' /></label>
				<label class='form-label'>Item price:<input type='text' name='product_price' class='form-control' /></label> <br>
                <label class='form-label'>Item description:<textarea name='product_description' cols="80" class='form-control'></textarea></label><br>

				<label class = 'form-label'>Item picture: 
                    <input type = 'file' name = 'product_image' class = 'form-control'></label><br>
				
				
				<input type="submit" name='action' value='Add!' class='form-control' />
			</form>
			<?php
				if ($data)
					echo "<div class='alert alert-danger' role='alert'> $data</div>";
			?>
			
		</div>
	</body>
</html>