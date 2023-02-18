<?php
session_start();
include "vendor/components/connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/font/stylesheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="assets/css/catalog.css">
    <title>Главная</title>
</head>
<body>
    <? include 'vendor/components/header.php' ?>
    <main class="all main_profile myorders">
        <div>
            <button class="myProfile_button">Мой профиль</button>
            <button class="myOrders_button">Мои заказы</button>
        </div>
        <section class="my_orders">

        </section>
    </main>
    <? include 'vendor/components/footer.php' ?>
</body>
</html>