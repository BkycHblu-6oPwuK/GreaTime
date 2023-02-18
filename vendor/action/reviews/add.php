<?
session_start();
include '../../components/connect.php';

if (isset($_POST['add_rev'])) {
    $reviews = mysqli_query($link, "SELECT * FROM `reviews` WHERE `id_user` = '{$_SESSION['user']['id']}' AND `id_prod` = '{$_POST['id_prod']}'");
    if (mysqli_num_rows($reviews) == 0) {
        mysqli_query($link, "INSERT INTO `reviews`(`id_user`, `id_prod`, `estimation`, `plus`, `minus`, `comment`, `date`)
        VALUES ('{$_SESSION['user']['id']}','{$_POST['id_prod']}','{$_POST['estimation']}','{$_POST['plus']}','{$_POST['minus']}','{$_POST['comment']}','{$_POST['date']}')");
        header('Location:../../../myOrders.php');
    } else {
        mysqli_query($link, "UPDATE `reviews` SET `estimation`='{$_POST['estimation']}',`plus`='{$_POST['plus']}',`minus`='{$_POST['minus']}',`comment`='{$_POST['comment']}',`date`='{$_POST['date']}' WHERE `id_user` = '{$_SESSION['user']['id']}' AND `id_prod` = '{$_POST['id_prod']}'");
        header('Location:../../../myOrders.php');
    }
}
