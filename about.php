<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>About Destrata</title>
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
    <img style="float: left; height:100px;" src="http://orig11.deviantart.net/a6fe/f/2014/179/3/5/untitled_drawing_by_frogsdolphins-d7ocsex.png">
    <div class="box1">
        <h2>This is DESTRATA.</h2>
        <h3>We produce the ink that will last forever</h3>
        <h1>WE ARE THE ETERNAL SQUID</h1>
    </div>
    <img style="width: 10%" src="https://i.ytimg.com/vi/PDpPVKroc8w/maxresdefault.jpg">
    <div class="box2">
        <h3>The History</h3>
        <p>
            Destrata was founded by Jerardo Andres (Andy) Diaz in January of 2016.
            Originally located within the START @ West-MEC building in the Grand Canyon State of Arizona,
            this Glendale Office Building/School, Destrata shared its home with more than 30 other businesses,
            most of them also being start-ups.
        </p><br>
        <h3>Our Products</h3>
        <p>
            Destrata is a publishing company still in its infancy meant to produce some of the future's biggest and baddest stories. Our job is to keep you reading!
        </p><br>
    </div>
    <img style="float: right; margin-top: 150px; margin-right: 40px;  width: 45%" src="http://pngimg.com/upload/book_PNG2115.png">
    <div class="box1" style="margin-left: 20px; width: 500px">
        <h3>Send us an email directly with a post here:</h3>
        <form method="post">
            <label style="margin-right: 26%" for="subject">Subject:</label><br>
            <input type="text" class="info-slot" name="subject"><br>
            <label style="float: left; margin-left: 17%" for="message">Message:</label><br>
            <textarea style="width: 60%; height: 80px" class="info-slot" name="message"></textarea><br>
            <input type='submit' class='button' id='send' name='send' value='Send' /><br>
        </form>
    </div>
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
<?php
if (isset($_POST['send'])) {
    $username = $_COOKIE['logUser'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if ($username != null){
        if (!empty($subject) && !empty($message)) {
            $dbc = new PDO('mysql:host=127.0.0.1;dbname=Destrata_db', 'root', 'root');
            $query = "INSERT INTO messages VALUES (0, NOW(), :username, :subject, :message)";
            $stmt = $dbc->prepare($query);
            $stmt->execute(
                array(
                    'username' => $username,
                    'subject' => $subject,
                    'message' => $message,
                )
            );
            ?>
            <script>alert('message sent');</script>
            <?php
        } else {
            ?>
            <script>alert('error while sending your message...');</script>
            <?php
        }
    }else{
        ?>
        <script>alert('We are sorry but you must be signed in to send a message');</script>
        <?php
    }
}
