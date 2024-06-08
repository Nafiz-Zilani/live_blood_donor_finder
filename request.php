<?php
session_start();
require_once"function.php";
$_user_id = $_SESSION['id'] ?? 0;
if (!$_user_id){
    header('Location: index.php');
    die();
}
include_once ('function.php');
include_once ('config.php');

$blood_type = $_POST['blood_type'];

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$status = 0;

$query = "SELECT x, y, user_name, number FROM user_info WHERE user_id='{$_user_id}'";
$result = mysqli_query($connection, $query);

$query2 = "SELECT x, y, user_name, number FROM user_info WHERE blood_group='{$blood_type}'";
$result2 = mysqli_query($connection, $query2);

$data = [];
while ($_data = mysqli_fetch_assoc($result)){
    array_push($data, $_data);
}
$data2 = [];
while ($_data2 = mysqli_fetch_assoc($result2)){
    array_push($data2, $_data2);
}
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <style>
        body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
        .w3-third img{margin-bottom: -6px; opacity: 0.8; cursor: pointer}
        .w3-third img:hover{opacity: 1}
    </style>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link src="style.css">
    <style>
        #map { height: 600px; }
    </style>
</head>
<body class="w3-light-grey w3-content" style="max-width:1600px" onload="call()">


<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-text-grey w3-collapse w3-top w3-center" style="z-index:3;width:300px;font-weight:bold" id="mySidebar"><br>
    <h5 class="w3-padding-64 w3-center"><b>Live🩸Donor<br>Finder</b></h5>
    <!--    <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hide-large">CLOSE</a>-->
    <a href="dashboard.php" class="w3-bar-item w3-button">Dashboard</a>
    <a href="request.php" class="w3-bar-item w3-button">Request</a>
    <a href="notification.php" class="w3-bar-item w3-button">Notification</a>
    <a href="user_data.php" class="w3-bar-item w3-button">Update Profile</a>
    <a href="history.php" class="w3-bar-item w3-button">History</a>
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

    <!-- Push down content on small screens -->
    <div class="w3-hide-large" style="margin-top:83px"></div>
    <h1 class="maintitle">
        <br>
        <br>
        <br>
    </h1>

    <!--Search-->
    <div style="width: 40%; padding-left: 5%">
        <form id="from02" method="post" action="">
            <label for="blood_type">Enter Required Blood Group</label>
            <input type="text" id="blood_type" name="blood_type">
            <input class="button-primary" type="submit" value="submit" onclick="call()">
            <input type="hidden" name="action" id="action" value="request_doner">
        </form>
    </div>
    <div id="map"></div>


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


    //function user_location() {
    //    let testValue2 = <?php //=json_encode($data)?>//;
    //    let mapOptions = {
    //        center:[testValue2[0].x, testValue2[0].y],
    //        zoom:15
    //    }
    //
    //    let map = new L.map('map' , mapOptions);
    //
    //    let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
    //    map.addLayer(layer);
    //
    //    let locations = [];
    //
    //    for (let i = 0; i < testValue2.length; i++) {
    //        locations.push({});
    //    }
    //
    //    for (let i = 0; i < testValue2.length; i++) {
    //        locations[i].lat = testValue2[i].x;
    //        locations[i].long = testValue2[i].y;
    //        locations[i].title = testValue2[i].user_name;
    //    }
    //
    //    let popupOption = {
    //        "closeButton":false
    //    }
    //
    //    locations.forEach(element => {
    //        new L.Marker([element.lat,element.long]).addTo(map)
    //            .on("mouseover",event =>{
    //                event.target.bindPopup('<div class="card"><h3>'+element.title+'</h3></div>',popupOption).openPopup();
    //            })
    //            .on("mouseout", event => {
    //                event.target.closePopup();
    //            })
    //            .on("click" , () => {
    //                window.open(element.url);
    //            })
    //    });
    //}

    function call() {
        let testValue2 = <?=json_encode($data2)?>;
        let mapOptions = {
            center:[testValue2[0].x, testValue2[0].y],
            zoom:15
        }

        let map = new L.map('map' , mapOptions);

        let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
        map.addLayer(layer);

        let locations = [];

        for (let i = 0; i < testValue2.length; i++) {
            locations.push({});
        }

        for (let i = 0; i < testValue2.length; i++) {
            locations[i].lat = testValue2[i].x;
            locations[i].long = testValue2[i].y;
            locations[i].title = testValue2[i].user_name;
            locations[i].number = testValue2[i].number;
            locations[i].email = testValue2[i].email;
            locations[i].blood_group = testValue2[i].blood_group;
        }

        let popupOption = {
            "closeButton":false
        }

        locations.forEach(element => {
            new L.Marker([element.lat,element.long]).addTo(map)
                .on("mouseover",event =>{
                    event.target.bindPopup('<div class="card">' +
                        '<h3>'+element.title+'</h3>' +
                        '</br>' +
                        '<h5>'+element.number+'</h5>' +
                        '<form id="form2" method="post" action="responce.php">' +
                        '<input type="hidden" name="user_name" id="user_name" value="'+element.title+'">' +
                        '<input type="hidden" name="number" id="user_number" value="'+element.number+'">' +
                        '<input type="submit" id="request_button" value="request">' +
                        '</form>' +
                        '</div>',popupOption).openPopup();
                })
                // .on("mouseout", event => {
                //     event.target.closePopup();
                // })
                .on("click" , () => {
                    window.open(element.url);
                })
        });
    }
</script>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="js/script.js"></script>
</html>
