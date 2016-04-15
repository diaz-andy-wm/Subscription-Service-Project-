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

    if (isset($_GET['idusers']) && isset($_GET['email'])) {
        // Grab the account data from the GET
        $idusers = $_GET['idusers'];
        $email = $_GET['email'];
    }else if (isset($_POST['idusers']) && isset($_POST['email'])) {
        // Grab the account data from the POST
    }else{
        echo "Sorry Account Not Found";
    }

    if (isset($_POST['submit'])) {
        if ($_POST['confirm'] == 'Yes') {
            $idusers = $_POST['idusers'];
            $email = $_POST['email'];

            // Connect to the database
            $dbh = new PDO('mysql:host=localhost;dbname=Destrata_db', 'root', 'root');
            // Delete the account data from the database

            $query = "DELETE FROM users WHERE idusers = $idusers";
            $stmt = $dbh->prepare($query);
            $stmt->execute();

            // Confirm success with the user
            echo '<p>The account for ' . $email . ' was successfully removed.';
        }
        else {
            echo '<p class="error">The account was not removed.</p>';
        }
    }
    else if (isset($idusers) && isset($email)) {
        echo '<p>Are you sure you want to delete the following Account?</p>';
        echo '<p><strong>Email: </strong>' . $email . '</p>';
        echo '<form method="post" action="remove.php">';
        echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
        echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
        echo '<input type="hidden" name="idusers" value="' . $idusers . '" />';
        echo '<input type="hidden" name="email" value="' . $email . '" />';
        echo '<input type="submit" value="Submit" name="submit" />';
        echo '</form>';
    }

    echo '<p><a href="admin.php">&lt;&lt; Back to admin page</a></p>';

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