<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title><?= $data->store_name ?></title>
    </head>
    <body>
        <div class='container' style='text-align:center;'>
			<?php
				$this->view('subviews/navigation');
			?>
            <h1><?= _("Store details") ?></h1>
            <form method='post' action=''>
                <label class='form-label'><?= _("Store name:") ?><input  type='text' name='store_name' class='form-control' value='<?= $data->store_name?>' /></label><br>
                <label class='form-label'><?= _("Store address:") ?><input type='text' name='store_address' class='form-control' value='<?= $data->store_address?>' /></label><br>
                <label class='form-label'><?= _("Store description:") ?><textarea name='description' cols="80" class='form-control'> <?= $data->description?></textarea></label><br>
                <input type="submit" name='action' value='<?= _("Update") ?>' class='form-control' />
            </form>
        </div>
    </body>
</html>