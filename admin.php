<?php
session_start();
require_once ('authorize.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Destrata</title>
    <link rel="stylesheet" type="text/css" href="primaryStyle.css">
</head>
<body>
<!--###  body start  ###-->
<!--# # # # # # # # # #-->
<!--#   HEADER DIV    #-->
<!--# # # # # # # # # #-->
<header>
    <div id="head">
        <div id="siteName">
            <h1>Destrata</h1>
            <img src="images/EternalSquid.png">
        </div>
        <br>
        <div id="signIn">
            <?php
            if($_COOKIE['logUser'] != null){
                ?>
                <ul>
                    <li><a href="logout.php">Log-Out</a></li>
                    <li><a href="admin.php"><?php echo $_COOKIE['logUser']?></a></li>
                </ul>
                <?php
            }else{
                ?>
                <ul>
                    <li><a href="logIn.php">Sign In</a></li>
                </ul>
                <?php
            }
            ?>
        </div>
    </div>
    <br><br><br>
    <div id="navbar">
        <ul>
            <li><a href="shop.html">Shop</a></li>
            <li><a href="subscribe.php">Subscribe</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="index.php">Home</a></li>
        </ul>
    </div>
</header>
<!--***  header end  ***-->
<!--# # # # # # # # # # -->
<!--#   CONTENT DIV   #-->
<!--# # # # # # # # # # -->
<div id="content">
    <?php

    $dbh = new PDO('mysql:host=localhost;dbname=Destrata_db', 'root', 'root');

    $query = "SELECT * FROM users";

    $stmt = $dbh->prepare($query);
    $stmt->execute();
    $name = $stmt->fetchall();

    echo'<table>';

    $i=0;

    echo '<tr><th>ID</th><th>Real</th><th>Name</th><th>Email</th><th>Password</th>';


    foreach ($name as $row) {
        echo '<tr><td>' . $row['idusers'] . '</td>';
        echo '<td>' . $row['firstname'] . '</td>';
        echo '<td>' . $row['lastname'] . '</td>';
        echo '<td>' . $row['email'] . '</td>';
        echo '<td>' . $row['password'] . '</td>';
        echo '<td><a href="remove.php?idusers=' . $row['idusers'] . '&amp;firstname=' . $row['firstname'] .
            '&amp;lastname=' . $row['lastname'] . '&amp;password=' . $row['password'] .
            '&amp;email=' . $row['email']  . '">Remove</a>
</td></tr>';

    }

    echo '</table>';



    ?>
</div>
<!--***  content end  ***-->
<!--# # # # # # # # # #-->
<!--#   FOOTER DIV    #-->
<!--# # # # # # # # # #-->
<footer>
    <div id="copyright">
        <p>&copy 2016 - Destrata Publishing. All Rights Reserved</p>
    </div>
    <div id="lowLinks">
        <a href="index.php">Home</a>
        <a href="logIn.php">Sign-In</a>
        <a href="about.php">About Us</a>
        <img src="images/EternalSquid.png">
    </div>
</footer>
<!--***  footer end   ***-->
<!--***    body end   ***-->
</body>
</html>