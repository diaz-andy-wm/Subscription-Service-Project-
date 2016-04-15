<!DOCTYPE html>
<html lang="en">
<head>
    <title>Destrata Log-In</title>
    <link rel="stylesheet" type="text/css" href="logInStyle.css">
</head>
<body>
<!--###  body start  ###-->
<!--# # # # # # # # # #-->
<!--#   HEADER DIV    #-->
<!--# # # # # # # # # #-->
<header>
    <h1>DESTRATA</h1>
    <img src="images/EternalSquid.png">
</header>
<!--***  header end  ***-->
<!--# # # # # # # # # #-->
<!--#   SECTION DIV   #-->
<!--# # # # # # # # # #-->
<section>
    <br>
    <h1>LOG-IN</h1>
    <form method="post">
        <label for="email_li">E-mail:</label>
        <input type="text" class="info-slot" id="email-li" name="email_li" /><br>
        <label for="password_li">Password:</label>
        <input type="password" class="info-slot" id="password-li" name="password_li" /><br>
        <input type='submit' class='button' id='login' name='login' value='Enter' /><br>
        <a href='#' onClick='alert("Sorry. Maybe write it down next time?")'>forgot your password?</a><br>
        <a href="register.php">don't have an account?</a>
    </form>
</section>
<!--***  section end  ***-->
<!--# # # # # # # # # #-->
<!--#   FOOTER DIV    #-->
<!--# # # # # # # # # #-->
<footer>
    <br>
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
if (isset($_POST['login'])) {
    $email_li = $_POST['email_li'];
    $password_li = $_POST['password_li'];

    if (!empty($email_li) && !empty($password_li)) {
        $dbc = new PDO('mysql:host=127.0.0.1;dbname=Destrata_db', 'root', 'root');
        $stmt = $dbc->prepare("SELECT * FROM users WHERE email=:email_li AND password=:password_li");
        $stmt->execute(
            array(
                'email_li' => $email_li,
                'password_li' => $password_li,
            )
        );
        $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
        if($stmt->rowCount() > 0) {
            ?>
            <script>alert('Successful Login');</script>
            <?php
            session_start();
            $_SESSION['user_session'] = $userRow['username'];
            setcookie('logUser', $_SESSION['user_session']);
            header("Location: index.php");
        }else{
            ?>
            <script>alert('Could not fetch email.');</script>
            <?php
        }
    }else{
        ?>
        <script>alert('Something was empty');</script>
        <?php
    }
}
?>