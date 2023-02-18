<?php
session_start();
include "../../components/connect.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $tel = $_POST['tel'];
    $name = $_POST['name'];
    $inn = $_POST['inn'];
    $password = md5($password . "whtrwhbrw");
    $if = 0;
    $users = mysqli_query($link, "SELECT * FROM `users` WHERE `email_user`='$email'");
    if (mysqli_num_rows($users) == 0) {
        $if++;
    } else {
        echo 1;
    }
    $users = mysqli_query($link, "SELECT * FROM `users` WHERE `tel_user`='$tel'");
    if (mysqli_num_rows($users) == 0) {
        $if++;
    } else {
        echo 2;
    }
    if ($if == 2) {
        mysqli_query($link, "INSERT INTO `users`(`email_user`, `password_user`, `tel_user`, `name_user`,`inn_user`,`status`) 
        VALUES ('$email', '$password','$tel', '$name','$inn','0')");
        $users = mysqli_query($link, "SELECT * FROM `users` WHERE `email_user`='$email' AND `password_user` = '$password'");
        if (mysqli_num_rows($users) >= 1) {
            $user = mysqli_fetch_array($users);
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name_user'],
                'email' => $user['email_user'],
                'user' => $user['status'],
            ];
        }
        echo 3;
    }
