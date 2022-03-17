<html>
    <head>
        <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title><?= $data->store_name ?></title>
    </head>
    <body>
        <?php
            $this->view('subviews/navigation');
        ?>
        
        <div class='container'>
           
            <form method='post' action='' enctype = 'multipart/form-data'>
				<label class='form-label'>Item name:<input type='text' name='product_name' class='form-control' value= '<?= $data->product_name?>' /></label>
				<label class='form-label'>Item quantity:<input type='text' name='product_quantity' class='form-control' value='<?= $data->product_quantity?>'/></label>
				<label class='form-label'>Item price:<input type='text' name='product_price' class='form-control' value='<?= $data->product_price?>' /></label> <br>
                <label class='form-label'>Item description:<textarea name='product_description' cols="80" class='form-control'><?= $data->product_description?></textarea></label><br>

				<label class = 'form-label'>Item picture: 
                    <input type = 'file' name = 'product_image' class = 'form-control'></label><br>
				
				
				<input type="submit" name='action' value='Update!' class='form-control' />
			</form>
        </div>
    </body>
</html>