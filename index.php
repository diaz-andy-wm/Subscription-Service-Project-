<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Destrata Page Index</title>
    <link rel="stylesheet" type="text/css" href="indexStyle.css">
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
<div id="topSide">
    <!-- Start cssSlider -->
    <div class='csslider1 autoplay '>
        <input name="cs_anchor1" id='cs_slide1_0' type="radio" class='cs_anchor slide' >
        <input name="cs_anchor1" id='cs_slide1_1' type="radio" class='cs_anchor slide' >
        <input name="cs_anchor1" id='cs_slide1_2' type="radio" class='cs_anchor slide' >
        <input name="cs_anchor1" id='cs_play1' type="radio" class='cs_anchor' checked>
        <input name="cs_anchor1" id='cs_pause1' type="radio" class='cs_anchor' >
        <ul>
            <div style="width: 100%; visibility: hidden; font-size: 0px; line-height: 0;">
                <img src="https://newevolutiondesigns.com/images/freebies/city-wallpaper-5.jpg" style="width: 100%;">
            </div>
            <li class='num0 img'>
                <a href="http://cssslider.com" target=""><img src='https://newevolutiondesigns.com/images/freebies/city-wallpaper-5.jpg' alt='DaCity' title='DaCity' /> </a>
            </li>
            <li class='num1 img'>
                <a href="http://cssslider.com" target=""><img src='https://tedcdnpi-a.akamaihd.net/r/tedcdnpe-a.akamaihd.net/images/ted/2d4398c107f807b406d168c13d607a07492662cd_2880x1620.jpg?quality=89&w=800' alt='KingE' title='KingE' /> </a>
            </li>
            <li class='num2 img'>
                <a href="http://cssslider.com" target=""><img src='https://s-media-cache-ak0.pinimg.com/736x/4b/6c/6c/4b6c6c3938fb8f06b507260773706945.jpg' alt='City2' title='City2' /> </a>
            </li>

        </ul>
        <div class='cs_description'>
            <label class='num0'>
                <span class="cs_title"><span class="cs_wrapper">The City of Sifus</span></span>
            </label>
            <label class='num1'>
                <span class="cs_title"><span class="cs_wrapper">King Eternal</span></span>
            </label>
            <label class='num2'>
                <span class="cs_title"><span class="cs_wrapper">You can't hide from our 'Monsters'</span></span>
            </label>
        </div>

        <div class='cs_bullets'>
            <label class='num0' for='cs_slide1_0'>
                <span class='cs_point'></span>
                <span class='cs_thumb'><img src='https://newevolutiondesigns.com/images/freebies/city-wallpaper-5.jpg' alt='DaCity' title='DaCity' /></span>
            </label>
            <label class='num1' for='cs_slide1_1'>
                <span class='cs_point'></span>
                <span class='cs_thumb'><img src='https://tedcdnpi-a.akamaihd.net/r/tedcdnpe-a.akamaihd.net/images/ted/2d4398c107f807b406d168c13d607a07492662cd_2880x1620.jpg?quality=89&w=800' alt='Croissant' title='Croissant' /></span>
            </label>
            <label class='num2' for='cs_slide1_2'>
                <span class='cs_point'></span>
                <span class='cs_thumb'><img src='https://s-media-cache-ak0.pinimg.com/736x/4b/6c/6c/4b6c6c3938fb8f06b507260773706945.jpg' alt='Lemon pie' title='Lemon pie' /></span>
            </label>
        </div>
    </div>
    <!-- End cssSlider -->
</div>
<aside>
    <div id="content">
        <div style="text-align: right" class="imgBox">
            <img src="https://i2.wp.com/i2.listal.com/image/2669447/500full.jpg">
            <h3><span>NEW SERIES:<span class='spacer'></span><br /><span class='spacer'></span>Monsters of the City</span></h3>
        </div>
        <div style="text-align: left" class="imgBox">
            <img src="images/Destrata%20Text.png">
            <h3><span>SUBSCRIBE NOW<span class='spacer'></span><br /><span class='spacer'></span>to get a New Monthly Destrata Comic!</span></h3>
        </div>
        <div class="imgBox">
            <img src="https://s-media-cache-ak0.pinimg.com/736x/0f/9a/ac/0f9aac29c2d2350d29dc34490d5154a6.jpg">
            <h3 style="top: 400px"><span>Jack Taylor:<span class='spacer'></span><br /><span class='spacer'></span>The only good cop of Sifus City</span></h3>
        </div>
    </div>
    <!-- divide -->
    <div id="other">
        <div class="imgBox">
            <img src="https://i2.wp.com/i2.listal.com/image/2669447/500full.jpg">
            <h3>Monsters of the City is a action packed<br> crime thriller placed in Sifus City,<br> the most dangerous city in the world.</h3>
        </div>
        <div class="imgBox">
            <img src="images/Destrata%20Text.png">
            <h3 style="top: 100px">For a monthly payment of $10, we will send you<br> the newest Destrata Comics as they come out.<br> With at least one comic coming out each month,<br> you can always keep reading!</h3>
        </div>
        <div class="imgBox">
            <img src="https://s-media-cache-ak0.pinimg.com/736x/0f/9a/ac/0f9aac29c2d2350d29dc34490d5154a6.jpg">
            <h3 style="top: 200px">BIO: Jack Taylor<br> OCCUPATION: SCPD Officer<br> AGE: 29<br> Seen as the biggest threat to the mobs<br> in charge of Sifus, he has now<br> become their biggest target.</h3>
        </div>
    </div>
    <!-- divide -->
    <div id="contentHider">
        <div style="text-align: right" class="imgBox2">
            <img src="http://cdn.1001freedownloads.com/vector/thumb/84197/bang_soundeffect.png">
        </div>
    </div>
</aside>

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