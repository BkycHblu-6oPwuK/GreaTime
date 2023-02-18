<? 
session_start();
include '../../components/connect.php';
if(isset($_POST['id_order_canc'])){
    $id_order = $_POST['id_order_canc'];
    $order_lists = mysqli_query($link,"SELECT * FROM `order_list` WHERE `id_order` = '$id_order'");
    while($order_list = mysqli_fetch_array($order_lists)){
        $product = mysqli_query($link,"SELECT * FROM `products` WHERE `id` = '{$order_list['id_products']}'");
        $prod = mysqli_fetch_array($product);

        if($order_list['size'] == NULL){
            $amount = $order_list['amount'] + $prod['amount'];
            mysqli_query($link,"UPDATE `products` SET `amount`='$amount' WHERE `id` = '{$order_list['id_products']}'");
        } else {
            $size = mysqli_query($link,"SELECT * FROM `sizes` WHERE `id_product` = '{$order_list['id_products']}' AND `size` = '{$order_list['size']}'");
            $size = mysqli_fetch_array($size);
            $amount = $order_list['amount'] + $prod['amount'];
            $amount_size = $order_list['amount'] + $size['amount'];
            mysqli_query($link,"UPDATE `products` SET `amount`='$amount' WHERE `id` = '{$order_list['id_products']}'");
            mysqli_query($link,"UPDATE `sizes` SET `amount`='$amount_size' WHERE `id_product` = '{$order_list['id_products']}' AND `size` = '{$order_list['size']}'");
        }
    }
    mysqli_query($link,"UPDATE `orders` SET `status`= '3' WHERE `id` = '$id_order'");
}

if(isset($_POST['id_order_del'])){
    $id_order = $_POST['id_order_del'];
    mysqli_query($link,"DELETE FROM `orders` WHERE `id` = '$id_order'");
}
?>