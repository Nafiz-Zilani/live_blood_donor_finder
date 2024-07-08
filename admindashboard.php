<?php
session_start();
require_once"function.php";
include_once('config.php');
$_user_id = $_SESSION['id'] ?? 0;
if (!$_user_id){
    header('Location: adminlogin.php');
    die();
}
include_once ('function.php');
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$status = 0;
//Total user query
$total_user_que = "SELECT COUNT(user_id) FROM user_info";
$total_user_res = mysqli_query($connection, $total_user_que);
$total_user_count = mysqli_fetch_array($total_user_res)[0];
//Total user admin
$total_admin_que = "SELECT COUNT(id) FROM admin_info";
$total_admin_res = mysqli_query($connection, $total_admin_que);
$total_admin_count = mysqli_fetch_array($total_admin_res)[0];
//Total user request
$total_request_que = "SELECT COUNT(reference) FROM history";
$total_request_res = mysqli_query($connection, $total_request_que);
$total_request_count = mysqli_fetch_array($total_request_res)[0];
//Total user response
$total_response_que = "SELECT COUNT(reference_id) FROM notification";
$total_response_res = mysqli_query($connection, $total_response_que);
$total_response_count = mysqli_fetch_array($total_response_res)[0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-text-grey w3-collapse w3-top w3-center" style="z-index:3;width:300px;font-weight:bold" id="mySidebar"><br>
    <h5 class="w3-padding-64 w3-center"><b>Live🩸Donor<br>Finder</b></h5>
    <a href="admindashboard.php" class="w3-bar-item w3-button">Dashboard</a>
    <a href="adminusers.php" class="w3-bar-item w3-button">Users</a>
    <a href="adminuadmin.php" class="w3-bar-item w3-button">Admins</a>
    <a href="adminhistory.php" class="w3-bar-item w3-button">History</a>
    <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16">
    <span class="w3-left w3-padding">Live🩸Donor<br>Finder</span>
    <a href="javascript:void(0)" class="w3-right w3-button w3-white" onclick="w3_open()">☰</a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">
    <hr>
    <hr>
    <div class="admindashboard" id="admindashboarduser">
        <h3>
            <label for="total_user">Total Number of User :   <?php echo $total_user_count; ?></label>
        </h3>
    </div>
    <hr>
    <div class="admindashboard">
        <h3>
            <label for="total_request">Total Number of Admin :   <?php echo $total_admin_count; ?></label>
        </h3>
    </div>
    <hr>
    <div class="admindashboard">
        <h3>
            <label for="total_admin">Total Number of Request:   <?php echo $total_request_count; ?></label>
        </h3>
    </div>
    <hr>
    <div class="admindashboard">
        <h3>
            <label for="total_response">Total Number of Response :   <?php echo $total_response_count; ?></label>
        </h3>
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