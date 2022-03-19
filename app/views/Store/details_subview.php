<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title><?= $data->store_name?></title>
    </head>
    <body>
        <h1 class = text-center><?= $data->store_name?></h1>
        <form method='post' action=''>
            <label class='form-label'>Store address:<input disabled type='text' name='store_address' class='form-control' value='<?= $data->store_address?>' /></label><br>
            <label class='form-label'>Store description:<textarea disabled type='text' name='description'  cols="80" class='form-control' > <?= $data->description?></textarea></label><br>
        </form>
            <?php
                if (isset($_SESSION['store_id']) && $_SESSION['store_id'] == $data->store_id) {
                    echo "<a href='/Product/create/$data->store_id'>Add a product</a>  | <a href='/Store/update/$data->store_id'>Update Store Page</a> | <a href='/Store/delete/$data->store_id'>Delete Store</a> <br> <br>";
                }

                $products = $data->getProducts($data->store_id);
                $this->view('subviews/products', $products); 
            ?>
        </body>
</html>

    
