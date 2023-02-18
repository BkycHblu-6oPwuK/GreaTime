<? 
include '../../components/connect.php';
if(isset($_POST['add_char'])){
    mysqli_query($link,"INSERT INTO `name_characteristic`(`name`) VALUES ('{$_POST['char']}')");
    header("Location:" . $_SERVER['HTTP_REFERER']);
}
if(isset($_POST['add_char_prod'])){
    mysqli_query($link,"INSERT INTO `characteristic`(`id_product`, `id_name_char`, `value`) VALUES ('{$_POST['prod']}','{$_POST['char']}','{$_POST['value']}')");
    header("Location:" . $_SERVER['HTTP_REFERER']);
}
?>