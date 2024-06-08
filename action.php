<?php

session_start();
include_once('config.php');

$action = $_POST['action'] ?? '';
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$status =0;

if (!$connection){
    throw new Exception("Didn't connect with database");
} else {
    if('register' == $action) {
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
    } elseif ('login' == $action) {
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
    } elseif ('update' == $action){
        $user_name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $blood_group = $_POST['blood'] ?? '';
        $number = $_POST['number'] ?? '';
        $userid = $_POST['userid'] ?? '';

        $query = "UPDATE user_info SET user_name='{$user_name}',email='{$email}', number='{$number}', blood_group='{$blood_group}' WHERE user_id={$userid}";
        $result = mysqli_query($connection, $query);
        header("Location: user_data.php");
    } elseif ('request' == $action){
        $user_name = $_POST['donor_name'] ?? '';
        $number = $_POST['donor_number'] ?? '';
        $userid = $_POST['userid'] ?? '';

        echo($user_name);
        echo($number);
        echo($userid);
        header("Location:done.php");

//        $query = "UPDATE user_info SET user_name='{$user_name}',email='{$email}', number='{$number}', blood_group='{$blood_group}' WHERE user_id={$userid}";
//        $result = mysqli_query($connection, $query);
//        header("Location: user_data.php");
    }
}

