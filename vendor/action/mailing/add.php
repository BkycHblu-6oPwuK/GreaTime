<? 
session_start();
include '../../components/connect.php';

$email = mysqli_query($link,"SELECT * FROM `mailing` WHERE `email` = '{$_POST['email']}'");
if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    if(mysqli_num_rows($email) == 0){
        mysqli_query($link,"INSERT INTO `mailing`(`email`) VALUES ('{$_POST['email']}')");
        echo 'suc';
    } else {
        echo 'err';
    }
} else {
    echo 'err_maiil';
}
?>