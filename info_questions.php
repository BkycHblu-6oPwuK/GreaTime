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
            <p class="header_info">Вопросы и ответы</p>
            <div class="info">
                <div class="info_block">
                    <p class="header_info_block">Вопрос</p>
                    <p class="info_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas inventore accusamus soluta ea suscipit quidem dignissimos, eveniet corrupti laudantium ipsum, harum rem iusto, reprehenderit unde corporis! Dolores nihil nesciunt in.</p>
                </div>
                <div class="info_block">
                    <p class="header_info_block">Вопрос</p>
                    <p class="info_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas inventore accusamus soluta ea suscipit quidem dignissimos, eveniet corrupti laudantium ipsum, harum rem iusto, reprehenderit unde corporis! Dolores nihil nesciunt in.</p>
                </div>
                <div class="info_block">
                    <p class="header_info_block">Вопрос</p>
                    <p class="info_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas inventore accusamus soluta ea suscipit quidem dignissimos, eveniet corrupti laudantium ipsum, harum rem iusto, reprehenderit unde corporis! Dolores nihil nesciunt in.</p>
                </div>
                <div class="info_block">
                    <p class="header_info_block">Вопрос</p>
                    <p class="info_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas inventore accusamus soluta ea suscipit quidem dignissimos, eveniet corrupti laudantium ipsum, harum rem iusto, reprehenderit unde corporis! Dolores nihil nesciunt in.</p>
                </div>
                <div class="info_block">
                    <p class="header_info_block">Вопрос</p>
                    <p class="info_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas inventore accusamus soluta ea suscipit quidem dignissimos, eveniet corrupti laudantium ipsum, harum rem iusto, reprehenderit unde corporis! Dolores nihil nesciunt in.</p>
                </div>
            </div>
            <div class="info">
                <p class="header_info">Не нашли ответ на вопрос свой вопрос?</p>
                <p class="info_text">Вы также можете задать вопрос по телевону. Звонок бесплатный.<a href="tel:88007002123"><span class="text_color_span"> 8-800-700-21-23</span></a></p>
            </div>
        </div>
    </main>
    <? include 'vendor/components/footer.php' ?>
</body>
</html>