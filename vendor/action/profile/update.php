<?php
session_start();
include "../../components/connect.php";

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $street = $_POST['home'];
    $city = $_POST['city'];
    $region = $_POST['oblast'];
    $index = $_POST['index'];
    $country = $_POST['country'];
    $if = '';

    $users_email = mysqli_query($link, "SELECT * FROM `users` WHERE `email_user`='$email'");
    $user_email = mysqli_fetch_array($users_email);
    if($email != $_SESSION['user']['email']){
        if(mysqli_num_rows($users_email) == 0){
            $if = 'email';
        } else {
            echo 'error_email';
        }
    }

    $users_tel = mysqli_query($link, "SELECT * FROM `users` WHERE `tel_user`='$tel'");
    $user_tel = mysqli_fetch_array($users_tel);
    if($tel != $_SESSION['user']['tel']){
        if(mysqli_num_rows($users_tel) == 0){
            $if = $if.'tel';
        } else {
            echo 'error_tel';
        }
    }

    if($tel == $_SESSION['user']['tel'] && $email == $_SESSION['user']['email']){
        mysqli_query($link,"UPDATE `users` SET `name_user`='$name',`surname_user`='$surname',`street_user`='$street',`city_user`='$city',`region_user`='$region',`postal_code_user`='$index',`country_user`='$country' WHERE `id` = '{$_SESSION['user']['id']}'");
        echo 'success';
    }
    if($if == 'email'){
        mysqli_query($link,"UPDATE `users` SET `email_user`='$email',`name_user`='$name',`surname_user`='$surname',`street_user`='$street',`city_user`='$city',`region_user`='$region',`postal_code_user`='$index',`country_user`='$country' WHERE `id` = '{$_SESSION['user']['id']}'");
        unset($_SESSION['user']);
        echo 'email_suc';
    }
    if($if == 'tel'){
        mysqli_query($link,"UPDATE `users` SET `tel_user`='$tel',`name_user`='$name',`surname_user`='$surname',`street_user`='$street',`city_user`='$city',`region_user`='$region',`postal_code_user`='$index',`country_user`='$country' WHERE `id` = '{$_SESSION['user']['id']}'");
        unset($_SESSION['user']);
        echo 'tel_suc';
    }
    if($if == 'email'.'tel'){
        mysqli_query($link,"UPDATE `users` SET `email_user`='$email',`tel_user`='$tel',`name_user`='$name',`surname_user`='$surname',`street_user`='$street',`city_user`='$city',`region_user`='$region',`postal_code_user`='$index',`country_user`='$country' WHERE `id` = '{$_SESSION['user']['id']}'");
        unset($_SESSION['user']);
        echo 'ssuccess';
    }

// echo 'error_email';
// echo 'error_tel';
//`email_user`='$email',`tel_user`='$tel',