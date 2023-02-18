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
            <p class="header_info">Как сделать заказ</p>
            <div class="info_block">
                <p class="header_info_block">Заказ можно оформить в несколько шагов, ничего сложного.</p>
                <ul>
                    <li><p class="info_text">Зарегистрируйтесь</p></li>
                    <li><p class="info_text">Выберите товары и добавьте их в корзину</p></li>
                    <li><p class="info_text">Перейдите в раздел Корзина и нажмите <span class="text_color_span">«Оформить заказ»</p></li>
                    <li><p class="info_text">Выберите способ доставки и укажите адрес</p></li>
                    <li><p class="info_text">Укажите номер телефона, email и ФИО получателя заказа</p></li>
                    <li><p class="info_text">Выберите способ оплаты и нажмите <span class="text_color_span">«Оформить заказ»</span></p></li>
                </ul>
            </div>
        </div>
    </main>
    <? include 'vendor/components/footer.php' ?>
</body>
</html>