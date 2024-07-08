<?php
session_start();
require_once "function.php";
$_user_id = $_SESSION['id'] ?? 0;
//if (!$_user_id) {
//    header('Location: adminlogin.php');
//    die();
//}
include_once('function.php');
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
</head>
<body class="home">
<div class="container" id="main">

    <h1 class="maintitle">
        <i class="fas fa-language"></i> <br/>Live Blood Donation
    </h1>
    <div class="row navigation">
        <div class="column column-60 column-offset-20">
            <div class="formactin">
            </div>
            <div class="formc">
                <form id="from01" method="post" action="action.php">
                    <h3>Admin Log In</h3>
                    <label for="name">Name</label>
                    <input type="text" placeholder="User Name" id="name" name="name">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Password" id="password" name="password">
                    <p>
                        <?php
                        $status = $_GET['status'] ?? 0;

                        if ($status){
                            echo getStatusMassage($status);
                        }
                        ?>
                    </p>

                    <input class="button-primary" type="submit" value="submit">
                    <input type="hidden" name="action" id="action" value="adminlog">
                </form>
            </div>
        </div>
    </div>

</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="js/script.js"></script>
</html>