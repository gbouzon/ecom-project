
  <h1>Store details</h1>
            <form method='post' action=''>
                <label class='form-label'>Store name:<input  disabled type='text' name='store_name' class='form-control' value='<?= $data->store_name?>' /></label><br>
                <label class='form-label'>Store address:<input disabled type='text' name='store_address' class='form-control' value='<?= $data->store_address?>' /></label><br>
                <label class='form-label'>Store description:<textarea disabled type='text' name='description'  cols="80" class='form-control' > <?= $data->description?></textarea></label><br>
            </form>
            <?php
                if (isset($_SESSION['store_id']) && $_SESSION['store_id'] == $data->store_id){
                    echo "<a href='/Product/create/$data->store_id'>Add an item</a>  | <a href='/Store/update/$data->store_id'>update</a> | <a href='/Store/delete/$data->store_id'>Delete</a>";
                }
            ?>


    
