<?php
session_start();
$_user_id = $_SESSION['id'] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blood Donation</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {font-family: "Times New Roman", Georgia, Serif;}
        h1, h2, h3, h4, h5, h6 {
            font-family: "Playfair Display";
            letter-spacing: 5px;
        }
    </style>
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top">
    <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
        <a href="#home" class="w3-bar-item w3-button">Live🩸Donor Finder</a>
        <!-- Right-sided navbar links. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <a href="home.php" class="w3-bar-item w3-button"><img src="image/home.png" alt="Home"></a>
            <a href="about.php" class="w3-bar-item w3-button">About US</a>
            <a href="contact.php" class="w3-bar-item w3-button">Contact</a>
            <?php
            if ($_user_id){
                ?>
                <a href="login.php" class="w3-bar-item w3-button" style="color: firebrick"><img src="image/login.png" height="30px"></a>
            <?php }else{?>
                <a href="login.php" class="w3-bar-item w3-button" style="color: firebrick">Log In</a>
            <?php }?>
        </div>
    </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:500px" id="home">
    <img class="w3-image" src="/w3images/hamburger.jpg" alt="Hamburger Catering" width="1600" height="800">
    <div class="w3-display-bottomleft w3-padding-large w3-opacity">
        <h1 class="w3-xxlarge">Le Catering</h1>
    </div>
</header>

<!-- Page content -->
<div class="w3-content" style="max-width:1100px">

    <div class="w3-row w3-padding-64" id="about">
        <img src="image/contact.png" alt="contact us" class="contact_image">
    </div>

    <hr>

    <!-- Contact Section -->
    <div class="w3-container w3-padding-64" id="contact">
        <h1>Contact</h1><br>
        <p>We like to offer full support to the user and donor. Because, it is a way to help a human live.</p>
        <p class="w3-text-blue-grey w3-large"><b>Address:</b> Shantinagra, Chamalibug, Dhaka-1216.</p>
        <p>You can also contact us by phone +8801726002438 or email nafiz_zilani@outlook, or you can send us a message here:</p>
        <form action="/action_page.php" target="_blank">
            <p><input class="w3-input w3-padding-16" type="text" placeholder="Email" required name="email"></p>
            <p><input class="w3-input w3-padding-16" type="number" placeholder="Subject" required name="subject"></p>
            <p><input class="w3-input w3-padding-16" type="text" placeholder="Message \ Special requirements" required name="message"></p>
            <p><button class="w3-button w3-light-grey w3-section" type="submit">SEND MESSAGE</button></p>
        </form>
    </div>

    <!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
    <p>Build by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">Md. Nafiz Imam Zilani</a></p>
</footer>

</body>
</html>