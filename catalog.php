<?php
session_start();
    if (isset($_GET['page'])){
        $page = $_GET['page'];
    }
    include "vendor/components/connect.php";
    if(isset($_GET['id_category'])) {
        $cat = 'one';
        $where = "`id_category` = '{$_GET['id_category']}'";
        $get = '&id_category='.$_GET['id_category'];
        $name_category = mysqli_query($link,"SELECT * FROM `category` WHERE `id` = '{$_GET['id_category']}'");
        $name_category = mysqli_fetch_array($name_category);
    } 
    if(isset($_GET['id_sub_category'])){
        $cat = 'two';
        $where = $where." AND `id_sub_cat` = '{$_GET['id_sub_category']}'";
        $get = $get.'&id_sub_category='.$_GET['id_sub_category'];
        $name_subcategory = mysqli_query($link,"SELECT * FROM `subcategory` WHERE `id` = '{$_GET['id_sub_category']}'");
        $name_subcategory = mysqli_fetch_array($name_subcategory);
    } 
    if(isset($_GET['id_sub_sub_category'])) {
        $cat = 'three';
        $where = $where." AND `id_sub_sub_cat` = '{$_GET['id_sub_sub_category']}'";
        $get = $get.'&id_sub_sub_category='.$_GET['id_sub_sub_category'];
        $name_sub_subcategory = mysqli_query($link,"SELECT * FROM `sub_subcategory` WHERE `id` = '{$_GET['id_sub_sub_category']}'");
        $name_sub_subcategory = mysqli_fetch_array($name_sub_subcategory);
    }
    $min_price = mysqli_query($link,"SELECT `price` FROM `products` WHERE $where ORDER BY `products`.`price` ASC");
    $max_price = mysqli_query($link,"SELECT `price` FROM `products` WHERE $where ORDER BY `products`.`price` DESC");
    $min_price = mysqli_fetch_array($min_price);
    $max_price = mysqli_fetch_array($max_price);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
    <link rel="stylesheet" href="assets/font/stylesheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/catalog.css">
    <link rel="stylesheet" href="assets/plagins/jquery-ui/jquery-ui.css">
</head>

<body>
    <? include 'vendor/components/header.php' ?>
    <main class="all all_catalog">
        <div class="filters">
            <div class="filters_top">
                <p>Фильтрация товаров</p>
            </div>
            <input type="hidden" id="refresh" value="no">
            <form action="" method="POST" class="filters_brand_form">
                <div class="filters_price">
                    <div class="filters_name"><span class="p_filters_brand_black">Цена</span></div>
                    <div class="input_price filters_checkbox">
                        <input type="text" id="min-price" name="min_price" value="<?if(!isset($POST['min_price'])){ echo $min_price['price']; }else{ echo $POST['min_price']; } ?>">
                        <input type="text" id="max-price" name="max_price" value="<?if(!isset($POST['max_price'])){ echo $max_price['price']; }else{ echo $POST['max_price']; } ?>">
                        <input type="hidden" id="max-price_hidden" value="<?=$max_price['price']?>">
                        <input type="hidden" name="one" value="<?=$_GET['id_category']?>">
                        <input type="hidden" name="two" value="<?=$_GET['id_sub_category']?>">
                        <input type="hidden" name="three" value="<?=$_GET['id_sub_sub_category']?>">
                        <input class="page" type="hidden" name="page" value="<?=$page?>">
                        <input type="hidden" class="sorting_input" name="sorting" value="pop">
                    </div>
                    <div id="slider"></div>
                </div>
                <div class="filters_brand">
                    <div class="filters_name"><span class="p_filters_brand_black">Бренд</span></div>
                    <label class="select_all_button">
                        <input class="input_checbox" type="checkbox" name="" value="">
                        <!-- <span class="span_checbox"></span> -->
                        <span class="span_name_filter">Все производители</span>
                    </label>
                    <div class="filters_brand_input filters_input">
                        <?
                        $products = mysqli_query($link,"SELECT * FROM `products` WHERE $where GROUP BY `brand`");
                        while($product = mysqli_fetch_array($products)){
                        ?>
                        <label class="filter_input">
                            <input class="input_checbox" type="checkbox" name="brands[]" value="<?=$product['brand']?>">
                            <!-- <span class="span_checbox"></span> -->
                            <span class="span_name_filter"><?=$product['brand']?></span>
                        </label>
                        <?
                        }
                        ?>
                    </div>
                </div>
                <button class="button_apply_filers">применить</button>
            </form>
        </div>
        <div class="right_catalog">
            <div class="catalog_top_h1">
                <h1>
                    <? 
                    if($_GET['id_category'] == '12' || $_GET['id_category'] == '23' ){
                        echo $name_category['name'].' '.mb_strtolower($name_subcategory['name']);
                        if(isset($_GET['id_sub_sub_category'])){
                            echo mb_strtolower(' '.'—'.' '.$name_sub_subcategory['name']);
                        }
                    }elseif(isset($_GET['id_sub_sub_category'])){
                        echo $name_sub_subcategory['name'];
                    }elseif(isset($_GET['id_sub_category'])){
                        echo $name_subcategory['name'];
                    }elseif(isset($_GET['id_category'])){
                        echo $name_category['name'];
                    }
                    ?>
                </h1>
            </div>
            <div class="catalog_top">
                <div class="catalog_sorting">
                    <div class="sorting_text">
                        <p>Сортировка:</p>
                    </div>
                    <div class="sorting_select">
                        <select name="" id="">
                            <option value="pop">Популярное</option>
                            <option value="low">Цена (низкая-высокая)</option>
                            <option value="high">Цена (высокая-низкая)</option>
                        </select>
                    </div>
                    <!-- <div class="sorting_text">
                        <p>Показать:</p>
                    </div>
                    <form action="vendor/action/catalog_sorting/sorting_amount.php" method="POST" class="sorting_amount">
                        <select name="sorting_amount" id="">
                            <option value="2">2</option>
                            <option value="4">4</option>
                            <option value="6">6</option>
                        </select>
                    </form> -->
                </div>
            </div>
            <div class="catalog_tovars">
                
            </div>
        </div>
    </main>
    <? include 'vendor/components/footer.php' ?>
</body>

</html>