<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Subscribe Destrata</title>
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
    <img style="height: 400px" src="http://free4illustrator.com/wp-content/uploads/books.jpg">
    <?php
        if($_COOKIE['logUser'] != null){
            $dbc = new PDO('mysql:host=127.0.0.1;dbname=Destrata_db', 'root', 'root');
            $stmt = $dbc->prepare("SELECT * FROM users WHERE username=:username");
            $stmt->execute(
                array(
                    'username' => $_COOKIE['logUser'],
                )
            );

            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() > 0) {
                $askSub = $userRow['subStatus'];
                if($askSub != 'subbed'){
                    $card = $userRow['credCard'];
                    if($card != 0){
                        ?>
                            <h3>Charge: $10 a month</h3>
                            <form method="post">
                                <input style="width: 100px" type='submit' class='button' id='subNow' name='subNow' value='Subscribe' /><br>
                            </form>
                            <h3>Credit Card Number <?php echo $card ?> will be used for this subscription</h3>
                        <?php
                        if (isset($_POST['subNow'])) {
                            $subStatus = 'subbed';
                            $subQuery = "UPDATE users SET subStatus=:subStatus WHERE username=:username;";
                            $subStmt = $dbc->prepare($subQuery);
                            $subStmt->execute(
                                array(
                                    'username' => $_COOKIE['logUser'],
                                    'subStatus' => $subStatus,
                                )
                            );
                            ?>
                                <script>alert('You are now subscribed!');</script>
                            <?php
                        }
                    }else{
                        ?>
                            <h3>Please enter your credit card number to subscribe.</h3>
                            <form method="post">
                                <label style="font-family: Copperplate, 'Copperplate Gothic Light', fantasy; font-size: 25px;" for="card">Credit Card Number:</label><br>
                                <input type="number" class="info-slot" name="card"><br>
                                <input type='submit' class='button' id='sCard' name='sCard' value='Send' /><br>
                            </form>
                        <?php
                        if (isset($_POST['sCard'])) {
                            $newCard = $_POST['card'];
                            if (!empty($newCard)) {
                                $cardQuery = "UPDATE users SET credCard=:credCard WHERE username=:username;";
                                $cardStmt = $dbc->prepare($cardQuery);
                                $cardStmt->execute(
                                    array(
                                        'username' => $_COOKIE['logUser'],
                                        'credCard' => $newCard,
                                    )
                                );
                                ?>
                                    <script>alert('Card Registered');</script>
                                <?php
                            }else{
                                ?>
                                    <script>alert('Please Fill the Card Info');</script>
                                <?php
                            }
                        }
                    }
                }else{
                    ?>
                        <h3>You Are Already Subscribed :)</h3>
                    <?php
                }
            }else{
                ?>
                    <script>alert('There was a problem with your account, please sign in again.');</script>
                <?php
            }
        }else{
            ?>
                <h3><a href="logIn.php">Log-in</a> or <a href="register.php">Sign-Up</a> to subscribe.</h3>
            <?php
        }
    ?>
    <img style="width: 20%" src="http://clipartion.com/wp-content/uploads/2015/11/super-hero-words-clip-art-free-clipart-images.jpg">
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