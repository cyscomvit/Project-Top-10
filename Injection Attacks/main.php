<!-- STOPID SHITTTT -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="owaspLogo.png">
    <title>SQL Injection</title>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#main">Try it out</a></li>
    </ul>
  </div>
</nav>
    <section class="Intro">
        <div class="heading">
            <div class="container">
                <p class="glitch">
                  <span aria-hidden="true"></span>
                  SQL Injection
                  <span aria-hidden="true"></span>
                </p>
              </div>
        </div>
    </section>
    <section class="about" id="about">
        <div class="aboutHeading">
            <h1>ABOUT</h1>
        </div>
        <p>
        SQL injection is a web security vulnerability that allows an attacker to interfere with the queries that an application makes to its database. It generally allows an attacker to view data that they are not normally able to retrieve. This might include data belonging to other users, or any other data that the application itself is able to access. In many cases, an attacker can modify or delete this data, causing persistent changes to the application's content or behavior.

<br><br>
In some situations, an attacker can escalate an SQL injection attack to compromise the underlying server or other back-end infrastructure, or perform a denial-of-service attack.        </p>
    </section>
    <section class="injection" id="main">
        <div class="injectionHeading">
            <h1>TRY IT OUT</h1>
        </div>
        <div class="main">
            <form action="main.php" method="get">
                <b>First Name : </b><input type="text" name="fname" class="input-stuff" style="color=black"/>
                <br>
                <br>
                <b>Last Name : </b><input type="text" name="lname" class="input-stuff" required/>
                <br>
                <br>
                <center><input type="submit" class="btn-submit"></center>
            </form>
        </div>
        <br>
            <div class="FinalOutput">
                <?php

                if (isset($_GET['fname']) && isset($_GET['lname'])) {
                    $ini = parse_ini_file('app.ini');
                    $servername = $ini['server_name']; 
                    $username = $ini['db_user'];
                    $password = $ini['db_password'];
                    $dbname = $ini['db_name'];
            
                    $conn = new mysqli($servername, $username, $password, $dbname);
            
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $userFirstName = $_GET['fname'];
                    $userLastName = $_GET['lname'];
                    //$id = $_GET['id'];
                    $sql = "SELECT id, fname, lname FROM myDB WHERE fname = '$userFirstName' AND lname = '$userLastName'";
                    //$sql = "SELECT first_name, last_name FROM users WHERE id = ".$id;
                    $result = $conn->query($sql);
            
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "| id: " . $row["id"]. " | Name : " . $row["fname"]. " " . $row["lname"]. " |<br>";
                    }
                    } else {
                        echo "0 results";
                    }
                    
                    $conn->close();
                }
            ?>
        
    </section>


 <!-- Second Injection -->



 <section class="injection" id="main" style="background-color: #104b55">
        <div class="injectionHeading">
            <h1>TRY IT OUT - 2</h1>
        </div>
        <div class="main">
            <form action="main.php" method="get">
                <b>User ID : </b><input  name="userId" class="input-stuff" required/>
                <br>
                <br>
                <center><input type="submit" class="btn-submit"></center>
            </form>
        </div>
        <br>
            <div class="FinalOutput2">
                <?php
                if (isset($_GET['userId'])) {
                    $ini = parse_ini_file('app.ini');
                    $servername = $ini['server_name']; 
                    $username = $ini['db_user'];
                    $password = $ini['db_password'];
                    $dbname = $ini['db_name'];

                    $conn = new mysqli($servername, $username, $password, $dbname);
            
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $id = $_GET['userId'];

                    //$sql = "SELECT id, fname, lname FROM myDB WHERE fname = '$userFirstName' AND lname = '$userLastName'";
                    $sql = "SELECT id, fname, lname FROM myDB WHERE id = '$id';";
                    $result = $conn->query($sql);
                    echo " <script>console.log($result)</script>";
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "| id: " . $row["id"]. " | Name : " . $row["fname"]. " " . $row["lname"]. " |<br>";
                            //echo $sql;
                            
                        }
                    } else {
                        echo "0 results";
                    }
                    
                    $conn->close();
                }
            ?>
        </div>
    </section>

   
</body>
<script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
</html>