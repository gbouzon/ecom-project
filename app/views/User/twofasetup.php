<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title><?=_("2fa Set Up")?></title>
    </head>
    <body style = 'text-align:center;'>
        <div class="container">>
            <h1><?=_("2 Factor Authentication Setup")?></h1> <br>
            <img src= "http://localhost/User/makeQRCode?data=<?= $data ?>" alt = "problem" style = 'max-width:200px;max-height:200px;display:block;margin-left:auto;margin-right:auto;'/> <br>
                <?=_("Please scan the QR-code on the screen with your favorite
                Authenticator software, such as Google Authenticator. The
                authenticator software will generate codes that are valid for 30
                seconds only. Enter such a code while and submit it while it is
                still valid to confirm that the 2-factor authentication can be
                applied to your account. ")?><br> <br>

            <form method="post" action="">
                <label class = 'form-label'><?=_("Current code:")?><input class = 'form-control' type="text" name="currentCode"
            /></label> <br>
                <input class = 'btn btn-primary' type="submit" name="2fa" value="<?=_("Verify code")?>" />
                <input class = 'btn btn-primary' type="submit" name="no_2fa" value="<?=_("Skip 2FA")?>" />
            </form>
        </div>
    </body>
</html>