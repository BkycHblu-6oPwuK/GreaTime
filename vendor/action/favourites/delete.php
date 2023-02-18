<?php
session_start();
include '../../components/connect.php';
if(isset($_POST['heart_tovar_del'])){
    $id_usera = $_SESSION['user']['id'];
    $id = $_POST['id_prod'];
    mysqli_query($link, "DELETE FROM `favourites` WHERE `id_product` = '$id' AND `id_user` = '$id_usera'");
    header('Location:' . $_SERVER['HTTP_REFERER']);
}
?>