<?php
session_start();
include "vendor/components/connect.php";
if (isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
    header('Location: favourites.php?page=1');
}
$filename = 'favourites.php';
$kol = 1; //количество записей для вывода
$art = ($page * $kol)-$kol; // определяем, с какой записи нам выводить
$res = mysqli_query($link,"SELECT COUNT(*) FROM `favourites` WHERE `id_user` = '{$_SESSION['user']['id']}'");
$row = mysqli_fetch_row($res);
$total = $row[0]; // всего записей
$str_pag = ceil($total / $kol);//узнаем сколько страниц будет
$favourites = mysqli_query($link, "SELECT * FROM `favourites` WHERE `id_user` = '{$_SESSION['user']['id']}' LIMIT $art,$kol");
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
    <link rel="stylesheet" href="assets/css/catalog.css">
    <title>Главная</title>
</head>
<style>
    .catalog_tovars{
        margin-top: 30px;
    }
</style>
<body>
    <? include 'vendor/components/header.php' ?>
    <main class="all">
        <div class="right_catalog favourites <?if(empty($_SESSION['user'])){echo 'favouritess';} ?>">
            <? if(mysqli_num_rows($favourites)>0): ?>
            <div class="catalog_top_h1">
                <h1>Избранное</h1>
            </div>
            <div class="catalog_tovars">
                <div class="catalog_tovars_two">
                    <?php 
                        while($fav = mysqli_fetch_array($favourites)){
                        $products = mysqli_query($link,"SELECT * FROM `products` WHERE `id` = '{$fav['id_product']}'");
                        while($product = mysqli_fetch_array($products)){
                    ?>
                    <div class="catalog_tovar">
                        <form action="vendor/action/favourites/delete.php" method="POST" class="img_heart_tovar">
                            <button type="submit" class="button_heart_tovar" name="heart_tovar_del"><img src="vendor/img/icons/close_big.png" alt=""></button>
                            <input type="hidden" name="id_prod" value="<? echo $product['id'] ?>">
                        </form>
                        <a href="page_tovar.php?id_tovar=<? echo $product['id'] ?>"><div class="img_popular_tovar"><picture><img src="vendor/img/products/<?echo $product['name']?>/<?echo $product['image']?>" alt=""></picture></div></a>
                        <div class="about_popular_tovar">
                            <div class="stars">
                                <img src="vendor/img/popular tovar/star_bacg.png" alt="">
                                <img src="vendor/img/popular tovar/star_bacg.png" alt="">
                                <img src="vendor/img/popular tovar/star_bacg.png" alt="">
                                <img src="vendor/img/popular tovar/star_bacg.png" alt="">
                                <img src="vendor/img/popular tovar/star.png" alt="">
                            </div>
                            <a href="page_tovar.php?id_tovar=<? echo $product['id'] ?>">
                                <p class="p_about_popular_tovar"><? echo $product['name'] ?></p>
                            </a>
                            <div class="price_popular_tovar">
                                <div class="form_price_popular_tovar">
                                    <div class="price">
                                        <p class="p_price"><?echo $product['price']?></p>
                                        <img class="img_rub" src="vendor/img/popular tovar/XMLID 449.png" alt="">
                                    </div>
                                    <a href="page_tovar.php?id_tovar=<?=$product['id']?>" class="add_basket"><img class="img_add_basket" src="vendor/img/popular tovar/Buy.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <? } } ?>
                </div>
                <? include 'vendor/components/nav_block_pagination.php' ?>
            </div>
            <? else: ?>
            <div class="basket_top">
                <h1>В избранном ничего нет</h1>
            </div>
            <div class="right_catalog favourites">
                <div class="catalog_tovars">
                    <div class="catalog_tovars_two">

                    </div>
                </div>
            </div>
            <? endif; ?>
        </div>
    </main>
    <? include 'vendor/components/footer.php' ?>
</body>

</html>