<html>
    <head>
            <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            
        <title>Home page</title>
    </head>
    <body>
        <div class='container'>
            <br> <h1 class="text-center">Search</h1> <br>
            <?php
        if ($data != null) {
            if (get_class($data[0]) == "app\models\Store") {
                    $this->view('subviews/storeList', $data);
            }
            else if (get_class($data[0]) == "app\models\Product") {   
                    $this->view('subviews/products', $data);;
            }
        }
        ?>
    </body>
</html>