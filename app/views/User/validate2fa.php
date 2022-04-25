<html>
    <head>
        <title>2fa validation</title>
    </head>
    <body>
        <?php
            if ($data)
                echo $data . "<br>";
        ?>
        Please enter your secret key to log into this application:
        <form method="post" action="">
            <label>Secret key: <input type="text" name="code"
            /></label>
            <input type="submit" name="action" value="Verify key" />
        </form>
    </body>
</html>