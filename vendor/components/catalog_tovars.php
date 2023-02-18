<?
session_start();
include "connect.php";
if($_POST['one'] != NULL){
    $where = "`id_category` = '{$_POST['one']}'";
    $get = '&id_category='.$_POST['one'];
}
if($_POST['two'] != NULL){
    $where = "`id_category` = '{$_POST['one']}' AND `id_sub_cat` = '{$_POST['two']}'";
    $get = '&id_category='.$_POST['one'].'&id_sub_category='.$_POST['two'];
}
if($_POST['three'] != NULL){
    $where = "`id_category` = '{$_POST['one']}' AND `id_sub_cat` = '{$_POST['two']}' AND `id_sub_sub_cat` = '{$_POST['three']}'";
    $get = '&id_category='.$_POST['one'].'&id_sub_category='.$_POST['two'].'&id_sub_sub_category='.$_POST['three'];
}
if(isset($_POST['min_price'])){
    $where = $where." AND `price` >= '{$_POST['min_price']}'";
}
if(isset($_POST['max_price'])){
    $where = $where." AND `price` <= '{$_POST['max_price']}'";
}
if(isset($_POST['brands'])){
    $where = $where."AND `brand` IN ('" . implode("','", $_POST['brands']) . "')";
}
if($_POST['sorting'] == 'low'){
    $where = $where."ORDER BY `price` ASC";
}
if($_POST['sorting'] == 'high'){
    $where = $where."ORDER BY `price` DESC";
}

?>
<div class="catalog_tovars_two">
<?php
    $_GET['page'] = $_POST['page'];
    $page = $_POST['page'];
    $kol = 3; //количество записей для вывода
    $art = ($page * $kol)-$kol; // определяем, с какой записи нам выводить
    $filename = 'catalog.php';
    $name = 'catalog_tovar';
    $res = mysqli_query($link,"SELECT COUNT(*) FROM `products` WHERE $where");
    $row = mysqli_fetch_row($res);
    $total = $row[0]; // всего записей
    $str_pag = ceil($total / $kol); //узнаем сколько страниц будет
    $products = mysqli_query($link,"SELECT * FROM `products` WHERE $where LIMIT $art,$kol");
    while($product = mysqli_fetch_array($products)){
    include 'card_product.php';
    }
    include 'nav_block_pagination.php';
?>
</div>