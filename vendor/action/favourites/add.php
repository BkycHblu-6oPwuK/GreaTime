<?php
    session_start();
    include '../../components/connect.php';
    $id_usera = $_SESSION['user']['id'];
    $id_prod = $_POST['id_prod'];
    $favourites = mysqli_query($link,"SELECT * FROM `favourites` WHERE `id_user` = '$id_usera' AND `id_product` = '$id_prod'");
    if(mysqli_num_rows($favourites) == 1){
        echo 'error';
    } else {
        mysqli_query($link,"INSERT INTO `favourites`(`id_user`, `id_product`) VALUES ('$id_usera','$id_prod')");
        echo 'success';
    }

?>