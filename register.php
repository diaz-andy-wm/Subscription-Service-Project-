<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Destrata Account</title>
    <link  rel="stylesheet" type="text/css" href="logInStyle.css">
</head>
<body>
<!--###  body start  ###-->
<!--# # # # # # # # # #-->
<!--#   HEADER DIV    #-->
<!--# # # # # # # # # #-->
<header>
    <div id="head">
        <br><br><br>
        <h1>Register</h1>
    </div>
</header>
<!--***  section end  ***-->
<!--# # # # # # # # # # -->
<!--#   CONTENT DIV   # -->
<!--# # # # # # # # # # -->
<div class="content">
    <!--#   http://www.yepp.nl/static/img/worlds/world_1/tentacles-desktop.png   # -->
    <form method="post">
        <label for="firstName">First Name:</label>
        <input type="text" class="info-slot" name="firstName"><br>
        <label for="lastName">Last Name:</label>
        <input type="text" class="info-slot" name="lastName"><br>
        <label for="email">Email:</label>
        <input type="email" class="info-slot" name="email"><br>
        <label for="username">Username:</label>
        <input type="text" class="info-slot" name="username"><br>
        <label for="password">Password:</label>
        <input type="password" class="info-slot" name="password"><br>
        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" class="info-slot" name="confirmPassword"><br>
        <input type='submit' class='button' id='submit' name='submit' value='Submit' /><br>
    </form>
</div>
<!--***  content end  ***-->
<!--# # # # # # # # # #-->
<!--#   FOOTER DIV    #-->
<!--# # # # # # # # # #-->
<div id="box">
    <br>
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
</div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($username) && !empty($password) && !empty($confirmPassword)) {
        if($password === $confirmPassword){
            $dbc = new PDO('mysql:host=127.0.0.1;dbname=Destrata_db', 'root', 'root');
            $query = "INSERT INTO users VALUES (0, :firstName, :lastName, :email, :username, :password, 0, 0)";
            $stmt = $dbc->prepare($query);
            $stmt->execute(
                array(
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'email' => $email,
                    'username' => $username,
                    'password' => $password,
                )
            );
            ?>
                <script>alert('successfully registered ');</script>
            <?php
            } else {
            ?>
                <script>alert('error while registering you...');</script>
            <?php
        }
    }
}
?>