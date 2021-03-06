<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title><?= _("2FA Validation") ?></title>
    </head>
    <body style = 'text-align:center;'>
        <div class='container' style='text-align:center;'>
            <h1><?= _("2 Factor Authentication Validation") ?></h1> <br>
            <?php
                if ($data)
                    echo "<div class='alert alert-danger' role='alert'> $data</div> <br>";
            ?>
            <form method="post" action="">
                <label class = 'form-label'><?= _("Please enter your secret key to log into this application:") ?> <input class = 'form-control'type="text" name="code"/></label> <br>
                <input class = 'btn btn-primary' type="submit" name="2fa" value="<?= _("Verify key") ?>" />
            </form>
        </div>
    </body>
</html>