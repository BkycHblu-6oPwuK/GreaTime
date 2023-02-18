<?php
session_start();
include "vendor/components/connect.php";
if(!$_SESSION['user']['admin']){
   header("Location: index.php");
}
if(empty($_GET['upd'])){
   $href = 'admin.php';
} else {
   $href = $_SERVER['HTTP_REFERER'];
}
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
   <link rel="stylesheet" href="assets/css/admin.css">
   <title>Document</title>
</head>
<body>
   <? include 'vendor/components/header.php' ?>
   <main class="all main_admin">
      <div class="admin_row">
         <? 
         if(empty($_GET)){
            echo '<a class="a_btn" href="?game">UMK3</a>';
            echo '<a class="a_btn" href="?all_product">Все товары</a>';
            echo '<a class="a_btn" href="?add_prod">Добавить товар</a>';
            echo '<a class="a_btn" href="?orders">Заказы</a>';
            echo '<a class="a_btn" href="?char">Характеристики</a>';
         } else {
            echo '<a class="a_btn" href="'.$href.'">Вернуться назад</a>';
         }
         ?>
      </div>
      <div class="admin_column">
         <? 
         if(isset($_GET['game'])){
            include 'vendor/components/admin/games.php';
         }
         if(isset($_GET['all_product'])){
            include 'vendor/components/admin/all_product.php';
         }
         if(isset($_GET['upd_prod'])){
            include 'vendor/components/admin/upd_product.php';
         }
         if(isset($_GET['add_prod'])){
            include 'vendor/components/admin/add_prod.php';
         }
         if(isset($_GET['orders'])){
            echo '<div class="admin_row"><div data-status="0" class="filter_order a_btn">В сборке</div><div data-status="1" class="filter_order a_btn">Готовые к получению</div><div data-status="2" class="filter_order a_btn">Завершенные</div><div data-status="3" class="filter_order a_btn">Отмененные</div></div>';
            echo '<div class="block_block"></div>';
         }
         if(isset($_GET['char'])){
            include 'vendor/components/admin/char.php';
         }
         ?>
      </div>
   </main>
   <? include 'vendor/components/footer.php' ?>
   <script src="assets/scripts/admin.js"></script>
</body>
</html>