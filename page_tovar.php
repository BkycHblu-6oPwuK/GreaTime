<?php
session_start();
    include "vendor/components/connect.php";
    $id_tovar = ($_GET['id_tovar']) ? $link -> real_escape_string(trim($_GET['id_tovar'])) : '';
    $result = $link->prepare("SELECT * FROM `products` WHERE `id` = ?");
    $result ->bind_param("s", $id_tovar);
    $result->execute();
    $result = $result->get_result();
    $row = $result->fetch_assoc();
    $name = 'popular_tovar';
    $reviews = mysqli_query($link,"SELECT AVG(`estimation`) FROM `reviews` WHERE `id_prod` = '{$row['id']}'");
    $chars = mysqli_query($link,"SELECT * FROM `characteristic` WHERE `id_product` = '{$row['id']}' AND `id_name_char` = '2'");
    $sizes = mysqli_query($link,"SELECT * FROM `sizes` WHERE `id_product` = '{$row['id']}' AND `amount` != 0");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/font/stylesheet.css">
    <link rel="preconnect" href="https:/fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/paga_tovar.css">
    <link rel="stylesheet" href="assets/css/catalog.css">
    <title>Товар</title>
</head>

<body>
    <? include 'vendor/components/header.php' ?>
    <main class="all page_tovar_all">
        <div class="page_tovar_top">
            <div class="tovar_left">
                <div class="tovar_img_top">
                    <picture><img src="vendor/img/products/<? echo $row['name'] ?>/<? echo $row['image'] ?>" alt=""></picture>
                </div>
                <!-- <div class="tovar_img_bottom">
                    <img src="vendor/img/popular tovar/Frame 306.png" alt="">
                    <img src="vendor/img/popular tovar/Frame 306.png" alt="">
                    <img src="vendor/img/popular tovar/Frame 306.png" alt="">
                </div> -->
            </div>
            <form class="tovar_right" method="POST">
                <div class="tovar_right_top">
                    <div>
                        <h1>Артикул:</h1>
                        <p><? echo $row['article'] ?></p>
                    </div>
                    <? 
                    $rev = mysqli_fetch_array($reviews);
                    include 'vendor/components/block_stars_review.php' 
                    ?>
                </div>
                <div class="tovar_name">
                    <h1><? echo $row['name'] ?></h1>
                </div>
                <div class="tovar_about">
                    <p><? echo $row['description'] ?> </p>
                </div>
                <div class="char">
                    <div class="tovar_brand">
                        <p class="haracter">Бренд:</p>
                        <p class="haracter-blue"><?=$row['brand']?></p>
                    </div>
                    <? 
                    if(mysqli_num_rows($chars) > 0):
                    $char = mysqli_fetch_array($chars);
                    ?>
                    <div class="tovar_brand">
                        <p class="haracter">Цвет:</p>
                        <p class="haracter-blue"><?=$char['value']?></p>
                    </div>
                    <? endif; ?>
                    <? 
                    if(mysqli_num_rows($sizes) > 0):
                    ?>
                    <div class="tovar_brand">
                        <p class="haracter">Размеры:</p>
                        <div class="block_sizes">
                            <? while($size = mysqli_fetch_array($sizes)): ?>
                            <div class="block_size"><?=$size['size']?></div>
                            <? endwhile; ?>
                        </div>
                        <input type="hidden" name="size" class="input_size" value="">
                    </div>
                    <? endif; ?>
                    <div class="tovar_availability">
                        <p class="haracter">Наличие:</p>
                        <p class="haracter-blue" id="haracter_availability"><? if($row['amount'] < 1){ ?>Нет в наличии<? }else{ ?>В наличии (<?=$row['amount']?>)шт.<? } ?></p>
                    </div>
                    <div class="tovar_price">
                        <p class="haracter">Цена:</p>
                        <p class="haracter-blue"><? echo $row['price'] ?></p>
                        <img class="img_rub-tovar" src="vendor/img/popular tovar/XMLID 449.png" alt="">
                    </div>
                </div>
                <div class="form_price_popular_tovar form_page_tovar" method="post">
                    <div class="put_plus_basket">
                        <button class="put_button_minus">-</button>
                        <input class="amount" type="text" name="amount" value="1">
                        <button class="put_button_plus">+</button>
                    </div>
                    <div class="put_basket">
                        <input type="hidden" name="id_prod" value="<? echo $row['id'] ?>">
                        <button name="add_basket" class="put_tovar_button">Добавить в корзину</button>
                        <!-- <button class="buy_tovar_button">Купить в один клик </button> -->
                        <button name="<?if(isset($_SESSION['user'])){echo 'heart_tovar';}else{echo 'heart_tov';}?>" class="like_tovar_button"></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="twoButton">
            <button class="button_visibleDesc btn_active">Описание</button>
            <button class="button_visibleHar btn_not_active">Характеристики</button>
            <button data-id="<?=$row['id']?>" class="button_visibleRev btn_not_active">Отзывы</button>
        </div>
        <div class="page_tovar_har">
            <div class="tovar_description">
                <p><?=$row['description'] ?> </p>
            </div>
            <div class="har">
                <? 
                $name_characteristics = mysqli_query($link,"SELECT * FROM `name_characteristic` WHERE 1");
                while($name_char = mysqli_fetch_array($name_characteristics)){
                $characteristics = mysqli_query($link,"SELECT * FROM `characteristic` WHERE `id_product` = '{$row['id']}' AND `id_name_char` = '{$name_char['id']}'");
                while($characteristic = mysqli_fetch_array($characteristics)){
                ?>
                <div class="har_left">
                    <p><?=$name_char['name']?>:</p>
                    <p><?=$characteristic['value']?></p>
                </div>
                <?
                }
                }
                ?>
            </div>
            <div class="tovar_rev_block"></div>
        </div>
        <div class="popular">
            <p class="p_center">Популярные товары</p>
            <div class="slider_two">
                <button id="prev_slider_two" class="two_slider_button"> <img src="vendor/img/icons/short_right2.png" alt=""> </button>
                <div class="all_slider_two">
                    <div class="sl_two_line">
                        <?php 
                        $products = mysqli_query($link,"SELECT * FROM `products` WHERE 1");
                        while($product = mysqli_fetch_array($products)){
                        include 'vendor/components/card_product.php';
                        }
                        ?>
                    </div>
                </div>
                <button id="next_slider_two" class="two_slider_button"> <img class="rotate" src="vendor/img/icons/short_right2.png"> </button>
            </div>
        </div>
    </main>
    <? include 'vendor/components/footer.php' ?>
</body>

</html>