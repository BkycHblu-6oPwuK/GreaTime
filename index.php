<?php
session_start();
include "vendor/components/connect.php";
$name = 'popular_tovar';
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
        <div class="slider">
            <div class="line_slider">
                <img class="slider_img" src="vendor/img/slider/image 1.png" alt="">
                <img class="slider_img" src="vendor/img/slider/image 2.png" alt="">
                <img class="slider_img" src="vendor/img/slider/image 3.png" alt="">
                <img class="slider_img" src="vendor/img/slider/image 4.png" alt="">
                <img class="slider_img" src="vendor/img/slider/image 5.png" alt="">
            </div>
            <div class="slider_buttons">
                <button id="prev" class="slider_button"> <img src="vendor/img/icons/short_right.png" alt=""> </button>
                <button id="next" class="slider_button"> <img class="rotate" src="vendor/img/icons/short_right.png"></button>
            </div>
        </div>
        <div class="assortment">
            <p class="p_center">Наш ассортимент</p>
            <div class="assortment_block">
                <div class="card">
                    <div class="card_tovar">
                        <a href="catalog.php?page=1&id_category=19"><img class="img_tovar" src="vendor/img/categories/тяж.png" alt=""></a>
                    </div>
                    <div class="card_tovar">
                        <a href="catalog.php?page=1&id_category=23"><img class="img_tovar" src="vendor/img/categories/одежда.png" alt=""></a>
                    </div>
                </div>
                <div class="card">
                    <div class="card_tovar">
                        <a href="catalog.php?page=1&id_category=12"><img class="img_tovar" src="vendor/img/categories/обувь.png" alt=""></a>
                    </div>
                    <div class="card_tovar">
                        <a href="catalog.php?page=1&id_category=11"><img class="img_tovar" src="vendor/img/categories/фитнес.png" alt=""></a>
                    </div>
                </div>
                <div class="card">
                    <div class="card_tovar">
                        <a href="catalog.php?page=1&id_category=22"><img class="img_tovar" src="vendor/img/categories/летние.png" alt=""></a>
                    </div>
                    <div class="card_tovar">
                        <a href="catalog.php?page=1&id_category=13"><img class="img_tovar" src="vendor/img/categories/турник.png" alt=""></a>
                    </div>
                </div>
                <div class="card">
                    <div class="card_tovar">
                        <a href="catalog.php?page=1&id_category=15"><img class="img_tovar" src="vendor/img/categories/лыж.png" alt=""></a>
                    </div>
                    <div class="card_tovar">
                        <a href="catalog.php?page=1&id_category=18"><img class="img_tovar" src="vendor/img/categories/бок.png" alt=""></a>
                    </div>
                </div>
                <div class="card">
                    <div id="card_tovar_end" class="card_tovar">
                        <a href="catalog.php?page=1&id_category=16"><img class="img_tovar" src="vendor/img/categories/конь.png" alt=""></a>
                    </div>
                    <div id="card_tovar_end" class="card_tovar">
                        <a href="catalog.php?page=1&id_category=17"><img class="img_tovar" src="vendor/img/categories/хоккей.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="popular">
            <p class="p_center">Популярные товары</p>
            <div class="slider_two">
                <button id="prev_slider_two" class="two_slider_button"> <img src="vendor/img/icons/short_right2.png" alt=""> </button>
                <div class="all_slider_two">
                    <div class="sl_two_line">
                        <?php 
                        $products = mysqli_query($link,"SELECT * FROM `products` WHERE 1 LIMIT 12");
                        while($product = mysqli_fetch_array($products)){
                        include 'vendor/components/card_product.php';
                        }
                        ?>
                    </div>
                </div>
                <button id="next_slider_two" class="two_slider_button"> <img class="rotate" src="vendor/img/icons/short_right2.png"> </button>
            </div>
        </div>
        <div class="plus">
            <div class="plus_top">
                <div class="plus_card">
                    <img class="plus_img" src="vendor/img/icons/plus1.png" alt="">
                    <h1 class="plus_h1">100% оригиналы</h1>
                    <p class="plus_p">Мы работаем со всеми представительствами брендов напрямую, а по некоторым из них являемся эксклюзивным оптовым каналом дистрибуции,
                        что дает нам возможность предлагать лучшие цены и условия.</p>
                </div>
                <div class="plus_card">
                    <img class="plus_img" src="vendor/img/icons/plus2.png" alt="">
                    <h1 class="plus_h1">100% качество</h1>
                    <p class="plus_p">У нас оригинальный и сертифицированный товар, что подтверждено официальными документами</p>
                </div>
                <div class="plus_card">
                    <img class="plus_img" src="vendor/img/icons/plus3.png" alt="">
                    <h1 class="plus_h1">Большой ассортимент</h1>
                    <p class="plus_p">Довольно широкий ассортимент товарова, вы обязательно сможете подобрать именно то, что нужно. У нас более 3000 категорий</p>
                </div>
                <div id="plusCard_end" class="plus_card">
                    <img class="plus_img" src="vendor/img/icons/plus4.png" alt="">
                    <h1 class="plus_h1">Доставка</h1>
                    <p class="plus_p">Моменталтная отгрузка товаров из Екатеринбурга в любую точку России любой крупной транспортной компанией. Наш склад находится в паре км от любой крупной ТК. Отгрузка товара в течение 1 дня. </p>
                </div>
            </div>
            <div class="plus_bottom">
                <div class="plus_card">
                    <img class="plus_img" src="vendor/img/icons/plus1.png" alt="">
                    <h1 class="plus_h1">Нам можно доверять</h1>
                    <p class="plus_p">Наша компания более 10 лет занимается продажей спортивных товаров. За это время мы накопили огромный опыт в оптовом направлении. У нас продуманы даже самые мелкие детали.</p>
                </div>
                <div class="plus_card">
                    <img class="plus_img" src="vendor/img/icons/plus2.png" alt="">
                    <h1 class="plus_h1">У нас нет очередей</h1>
                    <p class="plus_p">После оформления заказа, вы не попадете в очередь на выстпвление счета, в очередь на сборку заказа или в очередь на отгрузку. Мы осуществялем этот сервис моментально</p>
                </div>
                <div class="plus_card">
                    <img class="plus_img" src="vendor/img/icons/plus3.png" alt="">
                    <h1 class="plus_h1">Оперативная поддержка</h1>
                    <p class="plus_p">Если у вас возникла проблема, мы обязательно ее решим на раз-два-три. Мы работаем на все 100%, нам нечего бояться.</p>
                </div>
                <div id="plusCard_end" class="plus_card">
                    <img class="plus_img" src="vendor/img/icons/plus4.png" alt="">
                    <h1 class="plus_h1">Заказы</h1>
                    <p class="plus_p">Минимальная сумма заказа – всего 20 000 руб. Мы открыты для сотрудничества с малыми, средними и крупным бизнесом.</p>
                </div>
            </div>
        </div>
        <div class="price_email">
            <h1 class="price_h1">Оптовый прайс на почту</h1>
            <p class="price_p">В случае заинтересованности готовы направить вам прайс-лист с оптовыми ценами</p>
            <div class="send">
                <form action="" class="form_email_push" method="post">
                    <div class="send_price">
                        <input type="email" name="email" placeholder="Введите Ваш E-mail" required>
                    </div>
                    <div class="button_send_price">
                        <input type="submit" name="send">
                    </div>
                </form>
                <div style="color:white;padding-bottom: 20px;" id="erconts"></div>
            </div>
        </div>
        <div class="brends">
            <div class="brends_one">
                <img class="zso" src="vendor/img/brand/1.png" alt="">
                <img src="vendor/img/brand/2.png" alt="">
                <img src="vendor/img/brand/3.png" alt="">
                <img src="vendor/img/brand/4.png" alt="">
            </div>
            <div class="brends_two">
                <img class="plaster" src="vendor/img/brand/6.png" alt="">
                <img src="vendor/img/brand/7.png" alt="">
                <img src="vendor/img/brand/8.png" alt="">
                <img src="vendor/img/brand/9.png" alt="">
            </div>
            <div class="brends_three">
                <img class="xinja" src="vendor/img/brand/10.png" alt="">
                <img src="vendor/img/brand/11.png" alt="">
                <img src="vendor/img/brand/12.png" alt="">
                <img src="vendor/img/brand/13.png" alt="">
            </div>
        </div>
    </main>
    <? include 'vendor/components/footer.php' ?>
</body>

</html>