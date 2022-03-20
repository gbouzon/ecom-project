<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title><?= $data->product_name ?></title>
    </head>
    <body>
        <?php
			$this->view('subviews/navigation');
		?>
        <h2><?= $data->product_name?></h2>
        <div>
        <img alt = '' src = '\\app\\pictures\\<?= $data->product_image?>'/> <br> 
            <form method='post' action=''>
                <label class='form-label'>Product price:<input disabled type='number' name='product_price' class='form-control' value ='<?= $data->product_price ?>' /></label> <br>
                <label class='form-label'>Product description:<textarea disabled name='product_description' cols="80" class='form-control'> <?= $data->product_description ?> </textarea></label><br>    
            </form>
        </div>
    </body>
</html>