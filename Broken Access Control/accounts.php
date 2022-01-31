<!DOCTYPE html>
<head>
    <h1>
        My Account
    </h1>
</head>
<body>
    <br>
    <br>
    <br>
    <?php
        $uname = $_GET["uname"];
        if( $uname == "guest")
        {
            echo "You are logged in as guest";

            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "Sign in to access all the content";
    
        }
        else if( $uname == "Hector")
        {
            echo "You are logged in as ";
            echo $uname;
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "FLAG : OWASP{HPE@2022BAC}";
        }
        else if( $uname == "Juan")
        {
            echo "You are logged in as ";
            echo $uname;
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "FLAG : OWASP{AJX@2022BAC}";
        }
        else if( $uname == "James")
        {
            echo "You are logged in as ";
            echo $uname;
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "FLAG : OWASP{SPT@2022BAC}";
        }
        else if( $uname == "Carlos")
        {
            echo "You are logged in as ";
            echo $uname;
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "FLAG : OWASP{LAX@2022BAC}";
        }
    ?>

</body>