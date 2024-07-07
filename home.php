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

    <!-- About Section -->
    <div class="w3-row w3-padding-64" id="about">
        <div class="w3-col m6 w3-padding-large w3-hide-small">
            <img src="image/1.jpg" class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="600" height="750">
        </div>

        <div class="w3-col m6 w3-padding-large">
            <h1 class="w3-center"><img src="image/blood-donation.png" alt="O" height="50px">ur Solution</h1><br>
            <p class="w3-large">Our health solution aims to connect individuals in need of blood donors during emergencies. When a user requests a nearby donor, our system identifies matching blood donors in the vicinity and provides their contact information, facilitating communication between the requester and the donor.</p>
        </div>
    </div>

    <hr>

    <!-- Menu Section -->
    <div class="w3-row w3-padding-64" id="menu">
        <div class="w3-col l6 w3-padding-large">
            <h1 class="w3-center">Why Use our system</h1><br>
            <P>Our system is designed with simplicity in mind, ensuring that users can navigate it effortlessly.</P>
            <P>We prioritize speed, allowing users to quickly find the information they need during critical moments.</P>
            <P>Leveraging real-time data, we promptly locate users, ensuring timely assistance.</P>
            <P>Our system identifies the nearest donors first, streamlining the donor search process.</P>
            <P>Connecting with donors is made simple, facilitating effective communication.</P>
        </div>

        <div class="w3-col l6 w3-padding-large">
            <img src="image/2.jpg" class="w3-round w3-image w3-opacity-min" alt="Menu" style="width:100%">
        </div>
    </div>

    <!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
    <p>Build by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">Md. Nafiz Imam Zilani</a></p>
</footer>

</body>
</html>