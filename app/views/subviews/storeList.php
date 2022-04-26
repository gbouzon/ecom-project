<div>
    <?php
        if($data != null){
            foreach ($data as $store) {
                echo "<div class='card'>
                        <div class='card-body'>
                            <h3 class='text-info'><b><a href='/Store/index/$store->store_id'>$store->store_name</a></b></h3>
                            <h6> $store->store_address</h6>
                            <p>$store->description<p/>
                        </div>
                    </div>";
            }
        }
    ?>
</div>
