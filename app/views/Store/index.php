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
            <?php
                $this->view('Store/details_subview', $data);
            ?>
    
            <?php
                if (isset($_SESSION['store_id']) && $_SESSION['store_id'] == $data->store_id){
                    echo "<li><a href='/Product/create/$data->store_id'>Add an item</a></li>  <br>";
                    echo "<li><a href='/Store/update/$data->store_id'>update</a></li>  <br>";
                    echo "<li><a href='/Store/delete/$data->store_id'>Delete</a></li>  <br>";
                }
                     //do check for this and make sure only owner is allowed
                $products = $data->getProducts($data->store_id);
                $this->view('subviews/products', $products); //implement this
            ?>
        </div>
    </body>
</html>