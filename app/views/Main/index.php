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
            <?php
                //$this->view('subviews/publications', $data);
                $this->view('subviews/navigation');
            ?>
            <h1  class="text-center">Welcome to Meal Times!</h1>
            <div>
                <?php
                foreach ($data as $store) {
                    echo "<div class='card  w-50'>
                        <div class='card-body'>
                            <h3 class='text-info'><b><a href='/Store/index/$store->store_id'>$store->store_name</a></b></h3>
                            <h6> $store->store_address</h6>
                            <p>$store->description<p/>
                        </div>
                    </div>";
                }
                ?>
</div>
    </body>
</html>