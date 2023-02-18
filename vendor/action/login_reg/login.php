<?php
session_start();
include "../../components/connect.php";
$email = $_POST['email'];
$password = $_POST['password'];
$password = md5($password . "whtrwhbrw");
$users = mysqli_query($link, "SELECT * FROM `users` WHERE `email_user`='$email' AND `password_user` = '$password'");
if (mysqli_num_rows($users) == 0) {
echo 1; 
}
if(mysqli_num_rows($users) != 0) {
    $if++;
    $users = mysqli_query($link, "SELECT * FROM `users` WHERE `email_user`='$email' AND `password_user` = '$password' AND `status` = 0");
    if (mysqli_num_rows($users) >= 1) {
        $user = mysqli_fetch_array($users);
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name_user'],
            'email' => $user['email_user'],
            'tel' => $user['tel_user'],
            'user' => $user['status'],
        ];
        echo 3;
    } elseif ($if == 1) {
        $users = mysqli_query($link, "SELECT * FROM `users` WHERE `email_user`='$email' AND `password_user` = '$password' AND `status` = 1");
        if (mysqli_num_rows($users) >= 1) {
            $user = mysqli_fetch_array($users);
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name_user'],
                'email' => $user['email_user'],
                'tel' => $user['tel_user'],
                'admin' => $user['status'],
            ];
            echo 3;
        } else {
            $users = mysqli_query($link, "SELECT * FROM `users` WHERE `email_user`='$email' AND `password_user` = '$password' AND `status` = 2");
            if (mysqli_num_rows($users) >= 1) {
                echo 4;
            }
        }
    }
}
