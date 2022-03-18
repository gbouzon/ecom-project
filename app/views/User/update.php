<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <title>Profile update</title>
    </head>
    <body>
        <div class='container'>

            <h1>Update your profile</h1>
            <form method='post' action='' enctype = 'multipart/form-data'>
                <label class='form-label'>First name:<input type='text' name='first_name' class='form-control' value='<?= $data->first_name ?>' /></label>
                <label class='form-label'>Middle name:<input type='text' name='middle_name' class='form-control' value='<?= $data->middle_name ?>' /></label>
                <label class='form-label'>Last name:<input type='text' name='last_name' class='form-control' value='<?= $data->last_name ?>' /></label> <br>
                <label class='form-label'>Email:<input type='text' name='email' class='form-control' value='<?= $data->email ?>' /></label><br>
                <label class='form-label'>Phone number:<input type='text' name='phone' class='form-control' value='<?= $data->phone ?>' /></label><br>
                <label class = 'form-label'>Profile picture (if you want to change it): 
                    <input type = 'file' name = 'picture' class = 'form-control'></label><br>
                <input type="submit" name='action' value='Update!' class='form-control' />
            </form>
        </div>
    </body>
</html>