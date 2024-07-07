<?php

session_start();
include_once('config.php');

$action = $_POST['action'] ?? '';
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$status =0;

if (!$connection){
    throw new Exception("Didn't connect with database");
} else {
    if('register' == $action) {//Registration condition
        $user_name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $blood = $_POST['blood'] ?? '';
        $number = $_POST['number'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($user_name && $password) {
            $query = "INSERT INTO user_info(user_name, email, number, password, blood_group) VALUES ('{$user_name}', '{$email}', '{$number}', '{$password}', '{$blood}')";
            mysqli_query($connection, $query);
            header('Location: login.php');
        }
    } elseif ('login' == $action) {//Login Condition
        $user_name = $_POST['name'] ?? '';
        $password = $_POST['password'] ?? '';
        $x = $_POST['x'] ?? '';
        $y = $_POST['y'] ?? '';
        if ($user_name && $password) {
            $query = "SELECT user_id, password FROM user_info WHERE user_name='{$user_name}'";
            $query2 = "UPDATE user_info SET x='{$x}', y='{$y}' WHERE user_name='{$user_name}'";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result)>0){
                $data = mysqli_fetch_assoc($result);
                $_password = $data['password'];
                $_userid = $data['user_id'];

                if ($password == $_password){
                    $_SESSION['id'] = $_userid;
                    mysqli_query($connection, $query2);
                    header("Location: dashboard.php");
                    die();
                }
            }
        }
    } elseif ('update' == $action){ //User Profile Update Condition
        $user_name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $blood_group = $_POST['blood'] ?? '';
        $number = $_POST['number'] ?? '';
        $userid = $_POST['userid'] ?? '';

        $query = "UPDATE user_info SET user_name='{$user_name}',email='{$email}', number='{$number}', blood_group='{$blood_group}' WHERE user_id={$userid}";
        $result = mysqli_query($connection, $query);
        header("Location: user_data.php");
    } elseif ('request' == $action){ //Blood Donor Request Condition
        $doner_name = $_POST['donor_name'] ?? '';
        $doner_number = $_POST['donor_number'] ?? '';
        $userid = $_POST['userid'] ?? '';

        $query_req_1 = "SELECT user_name FROM user_info WHERE user_id = '{$userid}'";
        $result = $connection->query($query_req_1);
        while($row = $result->fetch_assoc()) {
            $user_name = $row["user_name"];
        }

        $query_req_2 = "INSERT INTO `notification` (`doner`, `user`, `user_contact`) VALUES ('{$doner_name}', '{$user_name}', '{$doner_number}')";
        $result2 = mysqli_query($connection, $query_req_2);
        header("Location:done.php");

    } elseif ('accept' == $action){ //Blood Donor accept Condition
        $ref_id = $_POST['refid'] ?? '';
        $status = $_POST['status'] ?? 0;
        if('Accept' == $status){
            $query = "UPDATE notification SET status='1' WHERE reference_id={$ref_id}";

        }
        elseif ('Decline' == $status){
            $query = "UPDATE notification SET status='2' WHERE reference_id={$ref_id}";
        }
        $result = mysqli_query($connection, $query);

        header("Location:notification.php");
    } elseif ('adminlog' == $action){ //Admin Login Condition
        $user_name = $_POST['name'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($user_name && $password) {
            $query = "SELECT id, password FROM admin_info WHERE name='{$user_name}'";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_assoc($result);
                $_password = $data['password'];
                $_userid = $data['id'];

                if ($password == $_password) {
                    $_SESSION['id'] = $_userid;
                    header("Location: admindashboard.php");
                    die();
                }
            }
        }
    } elseif ('adminupdate' == $action){
        //Add
    }
}

