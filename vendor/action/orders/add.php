<? 
session_start();
include '../../components/connect.php';
if(isset($_POST['add_order'])){
    $products = mysqli_query($link,"SELECT * FROM `busket` WHERE `id_user` = '{$_SESSION['user']['id']}'");
    $id_user = $_SESSION['user']['id'];
    $price_itog = $_POST['itog_price_order_input'];
    $shipping_methods = $_POST['delivery_method'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $telephone = $_POST['tel'];
    $email = $_POST['email'];
    $payment_method = $_POST['pay_method'];
    $date = $_POST['date'];
    $street = $_POST['street'];
    $home = $_POST['home'];
    $entrance = $_POST['entrance'];
    $flat = $_POST['flat'];
    $insert_order = mysqli_query($link,"INSERT INTO `orders` (`id_user`,`shipping_methods`, `name`, `surname`, `telephone`, `email`, `payment_method`,`price_itog`,`data`,`street`, `home`, `entrance`, `flat`) 
    VALUES ('$id_user', '$shipping_methods', '$name', '$surname', '$telephone', '$email', '$payment_method','$price_itog','$date','$street','$home','$entrance','$flat')");
    $id_order = mysqli_insert_id($link);

    while($product = mysqli_fetch_array($products)){
        $id_product = $product['id_product'];
        $amount = $product['amount'];

        if($product['size'] != NULL){
            $insert_order_list = mysqli_query($link,"INSERT INTO `order_list`(`id_order`, `id_products`, `size`, `amount`) VALUES ('$id_order','$id_product','{$product['size']}','$amount')");
        }else{
            $insert_order_list = mysqli_query($link,"INSERT INTO `order_list`(`id_order`, `id_products`, `amount`) VALUES ('$id_order','$id_product','$amount')");
        }

        if($product['size'] == NULL){
            $prod = mysqli_query($link,"SELECT * FROM `products` WHERE `id` = '$id_product'");
            $prod = mysqli_fetch_array($prod);
            $new_amount = $prod['amount'] - $amount;
            mysqli_query($link,"UPDATE `products` SET `amount`= '$new_amount' WHERE `id` = '$id_product'");
        } else {
            $prod = mysqli_query($link,"SELECT * FROM `products` WHERE `id` = '$id_product'");
            $prod = mysqli_fetch_array($prod);
            $prod_size = mysqli_query($link,"SELECT * FROM `sizes` WHERE `id_product` = '$id_product' and `size` = '{$product['size']}'");
            $prod_size  = mysqli_fetch_array($prod_size);
            $new_amount = $prod['amount'] - $amount;
            $new_amount_size = $prod_size['amount'] - $amount;
            mysqli_query($link,"UPDATE `products` SET `amount`= '$new_amount' WHERE `id` = '$id_product'");
            mysqli_query($link,"UPDATE `sizes` SET `amount`= '$new_amount_size' WHERE `id_product` = '$id_product' and `size` = '{$prod_size['size']}'");
        }

    }

    $del_busket = mysqli_query($link,"DELETE FROM `busket` WHERE `id_user` = '{$_SESSION['user']['id']}'");
    header("Location:../../../index.php");
}
?>
