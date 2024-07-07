<?php
session_start();
$_user_id = $_SESSION['id'] ?? 0;
if (!$_user_id){
    header('Location: user_data.php');
    die();
}
include_once ('function.php');
include_once('config.php');

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$status =0;
$_user_name = $_POST['user_name'];
$_user_number = $_POST['number'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Blood Donation</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <style>
        body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
        .w3-third img{margin-bottom: -6px; opacity: 0.8; cursor: pointer}
        .w3-third img:hover{opacity: 1}
    </style>
</head>
<body class="w3-light-grey w3-content" style="max-width:1600px">
<!------------------------------------------------------------------------------>
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-text-grey w3-collapse w3-top w3-center" style="z-index:3;width:300px;font-weight:bold" id="mySidebar"><br>
    <h5 class="w3-padding-64 w3-center"><b>Live🩸Donar<br>Finder</b></h5>
    <!--    <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hide-large">CLOSE</a>-->
    <a href="dashboard.php" class="w3-bar-item w3-button">Dashboard</a>
    <a href="user_location.php" class="w3-bar-item w3-button">Request</a>
    <a href="notification.php" class="w3-bar-item w3-button">Notification</a>
    <a href="user_data.php" class="w3-bar-item w3-button">Update Profile</a>
    <a href="history.php" class="w3-bar-item w3-button">History</a>
    <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16">
    <span class="w3-left w3-padding">Live🩸Donar<br>Finder</span>
    <a href="javascript:void(0)" class="w3-right w3-button w3-white" onclick="w3_open()">☰</a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

    <div class="container" id="main">

        <h1 class="maintitle">
            <br>
            <br>
            <br>
        </h1>

        <div class="row navigation">
            <div class="column column-60 column-offset-20">
                <div class="formactin">
                    <!--             <a href="#" id="register">Register</a>-->
                </div>
                <div class="formc">
                    <form id="from3" method="post" action="action.php">
                        <h3>User Info</h3>
                        <label for="name">Name</label>
                        <input type="text" id="donor_name" name="donor_name" value="<?php echo($_user_name);?>">
                        <label for="number">Phone Number</label>
                        <input type="text" id="donor_number" name="donor_number" value="<?php echo($_user_number); ?>">
                        <input type="hidden" id="userid" name="userid" value="<?php echo($_SESSION['id']); ?>">

                        <input class="button-primary" type="submit" value="request">
                        <input type="hidden" name="action" id="action" value="request"><a href="request.php">    | Cancel</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- Push down content on small screens -->
    <div class="w3-hide-large" style="margin-top:83px"></div>

    <!-- End page content -->
</div>
<script>
    // Script to open and close sidebar
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }

    // Modal Image Gallery
    function onClick(element) {
        document.getElementById("img01").src = element.src;
        document.getElementById("modal01").style.display = "block";
        var captionText = document.getElementById("caption");
        captionText.innerHTML = element.alt;
    }

</script>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="js/script.js"></script>
</html>