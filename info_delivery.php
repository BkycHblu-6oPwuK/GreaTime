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
            <p class="header_info">Доставка</p>
            <div class="info_block">
                <p class="header_info_block">Доставка осуществляется по всей России.</p>
                <p class="info_text">Работа над вашим заказом начинается автоматически после совершения покупки на сайте ......... Посылка передается выбранной Вами транспортной компании, которая осуществляет доставку покупок до двери или пвз. После отправки вы получите e-mail c трек-номером и информацией об отправлении. На любые вопросы, касающиеся доставки, мы с удовольствием ответим на .....</p>
            </div>
            <div class="info">
                <p class="header_info">Оплата</p>
                <div class="info_block">
                    <p class="header_info_block">Банковской картой</p>
                    <p class="info_text">При оформлении заказа выберите Онлайн оплата на сайте. Оплата товара происходит по полной предоплате.К оплате принимаются банковские карты, у которых 16, 18, 19 цифр в номере:VISA, MasterCard, American Express</p>
                    <p class="info_text">После оплаты заказа вам на почту придет электронный чек. Все электронные чеки хранятся в личном кабинете в разделе.</p>
                </div>
            </div>
        </div>
    </main>
    <? include 'vendor/components/footer.php' ?>
</body>
</html>