<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title><?= $data->first_name . " " . $data->last_name?></title>
    </head>
    <body> 
        <div class='container'>
            <?php
                $this->view('subviews/navigation');
            ?>
            <div style = 'text-align:center;'>
                <h1><?= _("Profile of ") . $data->first_name . " " . $data->middle_name . " " . $data->last_name?></h1>
                <form method='post' action='' enctype = 'multipart/form-data'>
                    <label class = 'form-label'><?=_("Profile picture:")?> <br>
                    <?php
                        echo "<img alt = '' src = '\\pictures\\$data->picture' style = 'max-width:200px;max-height:200px;display:block;margin-left:auto;margin-right:auto;'> <br>";
                    ?>
                    <label class='form-label'><?=_("First name:")?><input disabled type='text' name='first_name' class='form-control' value = '<?= $data->first_name?>' /></label>
                    <label class='form-label'><?=_("Middle name:")?><input disabled type='text' name='middle_name' class='form-control' value = '<?= $data->middle_name?>' /></label>
                    <label class='form-label'><?=_("Last name:")?><input disabled type='text' name='last_name' class='form-control'value = '<?= $data->last_name?>'  /></label> <br>
                    <label class='form-label'><?=_("Email:")?><input disabled type='email' name='email' class='form-control' value = '<?= $data->email?>' /></label><br>
                    <label class='form-label'><?=_("Phone number:")?><input disabled type='text' name='phone' class='form-control' value = '<?= $data->phone?>' /></label><br> <br>
                </form> 
                <?php
                    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $data->user_id) {
                        echo "<a class=\"btn btn-primary\" href='/User/update/$data->user_id' class='m-2' >". _("Update User") ." </a>
                        &ensp;<a class=\"btn btn-primary\" href='/User/delete/$data->user_id' class='m-2' >". _("Delete User") ."</a>";
                        if (!isset($_SESSION['store_id']))
                            echo "&ensp;<a class=\"btn btn-primary\" href ='/Store/create/$data->user_id' class='m-2'>". _("Create a Store") ."</a><br>";
                    }
                    echo "</div>"; 

                    if ($data->getStore($data->user_id)) {
                        echo "<br> <br>";
                        $this->view('Store/details_subview', $data->getStore($data->user_id));
                    }
                ?>
        </div>
    </body>
</html>