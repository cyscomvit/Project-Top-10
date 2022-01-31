<?php

$uname = $_GET["uname"];
$pass = $_GET["pass"];




if($uname == "guest" && $pass == "password")
{
    header("Location:http://localhost/BAC_Horizontal_Privilege_Escalation/accounts.php?uname=$uname");
}
else
{
    echo "INCORRECT PASSWORD OR USERNAME";
}

?>