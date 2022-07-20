<?php

session_start();

$conn = mysqli_connect('localhost', 'mani1', 'mani2002', 'owasptop10');
//"owasptop10" is the name of the database

if (!$conn) {
    echo "Unable to establish connection to Database";
}

$username = "";
$password = "";
$option1 = "";
$option2 = "";
$status = "";
$pwd_check = "";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $option1 = $_POST['radio-button'];
    $option2 = $_POST['display-button'];
}

/* "cryptographicfailureencoded" & "cryptographicfailurenotencoded" are the name of tables in the database where data is data is stored in encoded format and plain text format respectively and both the table contains four columns namely "FirstName", "LastName", "username" and "password". */
if ($option1 == "encode") {
    $sql = "SELECT * FROM cryptographicfailureencoded WHERE username = '$username'";
    $flag = 1;
} else {
    $sql = "SELECT * FROM cryptographicfailurenotencoded WHERE username = '$username'";
    $flag = 0;
}

$results = mysqli_query($conn, $sql);

foreach ($results as $r) {
    if ($flag == 1) {
        $pwd_check = password_verify($password, $r['password']);
    } else if ($flag == 0) {
        if ($password == $r['password']) {
            $pwd_check = 1;
        } else {
            $pwd_check = 0;
        }
    }
    if ($pwd_check == 1) {
        $_SESSION['uname'] = $r['username'];
        $status = "Successfully Logged In !";
        if ($option2 == "display") {
            $title = "User Details";
            $fname = "First Name: " . $r['First Name'];
            $lname = "Last Name: " . $r['Last Name'];
            $displayUsername = "Username: " . $r['username'];
            $displayPassword = "Password: " . $r['password'];
        }
    } else {
        $status = "Invalid Credentials";
    }
}

if (isset($_POST['ok'])) {
    session_destroy();
    header("Location: /");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>CYSCOM - Cryptographic Failures</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <div class="title">Cryptographic Failure</div>
        <div class="content">
            <form method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <div class="input-box">
                            <span class="details">Username</span>
                            <input type="text" placeholder="Enter your username" name="username" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Password</span>
                            <input type="password" placeholder="Enter your password" name="password" required>
                        </div>
                    </div>
                </div>
                <div>
                    <input type="radio" value="plaintext" name="radio-button" id="dot-1" checked="checked">
                    <input type="radio" value="encode" name="radio-button" id="dot-2">
                    <input type="radio" value="display" name="display-button" id="dot-3">
                    <input type="radio" value="dontDisplay" name="display-button" id="dot-4" checked="checked">
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="plaintext">Plain Text</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="encode">Encoded Format</span>
                        </label>
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span class="encode">Display User Details</span>
                        </label>
                    </div>
                </div>
                <div class="butn">
                    <button class="login-button" role="button" name="submit">Submit</button>
                </div>
                <?php echo $status;
                if ($option2 == "display" && $pwd_check == 1) {
                    echo "<br>" .  $title . ":-<br>";
                    echo $fname . "<br>";
                    echo $lname . "<br>";
                    echo $displayUsername . "<br>";
                    echo $displayPassword . "<br>";
                }
                ?>
            </form>
            <?php if (!empty($_SESSION['uname'])) { ?>
                <form method="POST">
                    <button class="login-button" role="button" name="ok">Ok</button>
                </form>
            <?php } ?>
        </div>
    </div>
</body>

</html>
