<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title><?= $data->product_name ?></title>
    </head>
    <body>
        
        <div class='container' style='text-align:center;'>
        <?php
			$this->view('subviews/navigation');
		?>
        <br><h2><?= $data->product_name?></h2> <br>
            <?php
                echo "<img alt = '' src = '\\pictures\\$data->product_image' style = 'max-width:200px;max-height:200px;display:block;margin-left:auto;margin-right:auto;'> <br>";
            ?>
            <form method='post' action=''>
                <label class='form-label'><?= _("Product price:") ?><input disabled type='number' name='product_price' class='form-control' value ='<?= $data->product_price ?>' /></label> <br> <br>
                <label class='form-label'><?= _("Product description:") ?><textarea disabled name='product_description' cols="80" class='form-control'> <?= $data->product_description ?> </textarea></label><br>    
            </form>
        </div>
    </body>
</html>