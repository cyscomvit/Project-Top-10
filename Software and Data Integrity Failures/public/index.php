<?php
  $adminid = "admin@gmail.com";
  $adminpswd = "password";

  $acc1 = "user1@gmail.com";
  $acc1pswd = "helloworld";

  if(isset($_POST['userid']) && isset($_POST['password'])){
    $uid = $_POST['userid'];
    $pwd = $_POST['password'];

    if($uid == $adminid && $pwd == $adminpswd){
      $isAdmin = True;
    }
    else if($uid == $acc1 && $pwd == $acc1pswd){
      $isAdmin = False;
    }
    else{
      echo "incorrect emailid and/or password";
      exit();
    }
    $arr_str = serialize(array('id'=>$uid,'isAdmin'=>$isAdmin));
    setcookie('user',$arr_str,time() + (86400 * 30), "/");
    header("Location: http://localhost/top10/welcome.php"); /* Redirect browser */
    exit();
  }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Software and Data Integrity Failures</title>
        <!-- Bootstrap CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- CSS -->
        <link href="signin.css" rel="stylesheet">
    </head>
    <body class="text-center">
        <main class="form-signin w-100 m-auto">
          <form method="POST" action="#">
            <img class="mb-4" src="../images/cyscom.png" alt="" width="80" height="80">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
              <input name="userid" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
              <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Password</label>
            </div>
            <br>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
          </form>
        </main>
    </body>
</html>