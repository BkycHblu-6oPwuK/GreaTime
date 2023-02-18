<?php
session_start();
include '../../components/connect.php';
if(isset($_SESSION['user'])){
    $id_usera = $_SESSION['user']['id'];
    $id_prod = $_POST['id_prod'];
    $amount = $_POST['amount'];
    $baskets = mysqli_query($link, "SELECT * FROM `busket` WHERE `id_user` = '$id_usera' AND `id_product` = '$id_prod'");
    $products = mysqli_query($link,"SELECT * FROM `products` WHERE `id` = '$id_prod'");
    $size = mysqli_query($link,"SELECT * FROM `sizes` WHERE `id_product` = '$id_prod' AND `size` = '{$_POST['size']}'");
    $size = mysqli_fetch_array($size);
    $size_busket = mysqli_query($link,"SELECT * FROM `busket` WHERE `id_user` = '$id_usera' AND `id_product` = '$id_prod' AND `size` = '{$_POST['size']}'");
    $size_bus = mysqli_fetch_array($size_busket);
    $product = mysqli_fetch_array($products);
    $tovar = mysqli_fetch_array($baskets);
    $itog = $tovar['amount'] + $amount;

    if($_POST['size'] != NULL){
        if(mysqli_num_rows($size_busket) == 0){
            if($_POST['amount'] > $size['amount']){
                echo 'error';
            }elseif($_POST['amount'] <= $size['amount']){
                $insert = mysqli_query($link,"INSERT INTO `busket`(`id_user`, `id_product`, `size`, `amount`) VALUES ('$id_usera','$id_prod','{$_POST['size']}','$amount')");
                echo 'insert';
            }
        } else {
            if($_POST['amount'] + $tovar['amount'] > $size['amount']){
                echo 'error';
            }elseif($_POST['amount'] + $tovar['amount']  <= $size['amount']){
                $update = mysqli_query($link, "UPDATE `busket` SET `amount`= '$itog' WHERE `id_user` = '$id_usera' AND `id_product` = '$id_prod' AND `size` = '{$_POST['size']}'");
                echo 'upd';
            }
        }
    } else {
        if(mysqli_num_rows($baskets) == 0){
            if($_POST['amount'] > $product['amount']){
                echo 'error';
            }elseif($_POST['amount'] <= $product['amount']){
                $insert = mysqli_query($link, "INSERT INTO `busket` (`id_user`, `id_product`, `amount`) VALUES ('$id_usera','$id_prod', '$amount')");
                echo 'insert';
            }
        } else {
            if($_POST['amount'] + $tovar['amount'] > $product['amount']){
                echo 'error';
            }elseif($_POST['amount'] + $tovar['amount']  <= $product['amount']){
                $update = mysqli_query($link, "UPDATE `busket` SET `amount`= '$itog' WHERE `id_user` = '$id_usera' AND `id_product` = '$id_prod'");
                echo 'upd';
            }
        }
    }
} else {
    echo 'auth';
}
?>
