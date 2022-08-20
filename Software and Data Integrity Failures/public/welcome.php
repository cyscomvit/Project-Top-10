<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>WELCOME</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <?php
            $arr_str = unserialize($_COOKIE['user']);
        ?>
        <h3>Welcome! </h3>
        <h3>email id : <?php echo $arr_str['id']?></h3>
        <h3><?php if($arr_str['isAdmin']) echo "flag : {adm1n_acc_accessed}";?></h3>
    </body>
</html>