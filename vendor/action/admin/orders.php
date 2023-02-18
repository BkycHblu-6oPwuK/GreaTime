<?
include '../../components/connect.php';
mysqli_query($link,"UPDATE `orders` SET `status`= '{$_POST['value']}' WHERE `id` = '{$_POST['id']}'");
?>