<? 
session_start();
include '../../components/connect.php';
if(isset($_POST['promo'])){
    $promokodes = mysqli_query($link,"SELECT * FROM `promokode` WHERE `name` = '{$_POST['promo']}'");
    if(mysqli_num_rows($promokodes) > 0){
        while($promokode = mysqli_fetch_array($promokodes)){
        $user_promo = mysqli_query($link,"SELECT * FROM `busket` WHERE `id_promokode` = '{$promokode['id']}'");
            if(mysqli_num_rows($user_promo) == 0){
                $update_basket = mysqli_query($link,"UPDATE `busket` SET `id_promokode` = '{$promokode['id']}' WHERE `id_product` = '{$promokode['id_product']}'");
                echo 'suc';
            }else{
                echo 'serr';
            }
        }      
    } else {
        echo 'err';
    }
}
?>