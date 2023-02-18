<?php
session_start();
include '../../components/connect.php';

$basket = mysqli_query($link,"SELECT * FROM `busket` WHERE `id_user` = '{$_SESSION['user']['id']}' AND `id_product` = '{$_POST['id']}'");
$basket = mysqli_fetch_array($basket);
$products = mysqli_query($link,"SELECT * FROM `products` WHERE `id` = '{$_POST['id']}'");
$product = mysqli_fetch_array($products);

if($_POST['size'] == NULL){
    if($_POST['amount'] > $product['amount']){
        echo $basket['amount']; 
    }elseif($_POST['amount'] <= $product['amount']){
        $update = mysqli_query($link,"UPDATE `busket` SET `amount`= '{$_POST['amount']}' WHERE `id_user` = '{$_SESSION['user']['id']}' AND `id_product` = '{$_POST['id']}'");
    }
} else {
    $basket = mysqli_query($link,"SELECT * FROM `busket` WHERE `id_user` = '{$_SESSION['user']['id']}' AND `id_product` = '{$_POST['id']}' AND `size` = '{$_POST['size']}'");
    $basket = mysqli_fetch_array($basket);
    $size = mysqli_query($link,"SELECT * FROM `sizes` WHERE `id_product` = '{$_POST['id']}' AND `size` = '{$_POST['size']}'");
    $size = mysqli_fetch_array($size);
    if($_POST['amount'] > $size['amount']){
        echo $basket['amount'];
    } else {
        $update = mysqli_query($link,"UPDATE `busket` SET `amount`= '{$_POST['amount']}' WHERE `id_user` = '{$_SESSION['user']['id']}' AND `id_product` = '{$_POST['id']}' AND `size` = '{$_POST['size']}'");
    }
}