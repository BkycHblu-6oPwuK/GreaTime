<?php
session_start();
include '../../components/connect.php';
if(isset($_POST['close'])){
    $id = $_POST['id'];
    $busket = mysqli_query($link,"SELECT * FROM `busket` WHERE `id` = '$id'");
    $bus = mysqli_fetch_array($busket);
    $product = mysqli_query($link,"SELECT * FROM `products` WHERE `id` = '{$bus['id_product']}'");
    $prod = mysqli_fetch_array($product);

    if($bus['size']==NULL){
        $busket_del = mysqli_query($link, "DELETE FROM `busket` WHERE `id` = '$id'");
        header('Location:' . $_SERVER['HTTP_REFERER']);
    } else {
        $busket_del = mysqli_query($link, "DELETE FROM `busket` WHERE `id` = '$id'");
        header('Location:' . $_SERVER['HTTP_REFERER']);
    }
}
?>