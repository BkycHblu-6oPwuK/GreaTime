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
    <title>Главная</title>
</head>
<body>
    <? include 'vendor/components/header.php' ?>
    <main class="all">
        <div class="info">
            <p class="header_info">Возврат товара</p>
            <div class="info_block">
                <p class="header_info_block">Если вам не подошли один или несколько товаров, вы можете вернуть их в течение 14 дней с момента покупки. Это очень просто:</p>
                <ul>
                    <li><p class="info_text">С чеком в магазин</p></li>
                </ul>
            </div>
        </div>
    </main>
    <? include 'vendor/components/footer.php' ?>
</body>
</html>