<?
session_start();
include 'connect.php';
$id_usera = $_SESSION['user']['id'];
$tovars = mysqli_query($link, "SELECT * FROM `busket` WHERE `id_user` = '$id_usera'");
while ($tovar = mysqli_fetch_array($tovars)) {
    $products = mysqli_query($link, "SELECT * FROM `products` WHERE `id` = '{$tovar['id_product']}'");
    while ($product = mysqli_fetch_array($products)) {
        if ($tovar['id_promokode'] != NULL) {
            $promokode = mysqli_query($link, "SELECT * FROM `promokode` WHERE `id` = '{$tovar['id_promokode']}'");
            $promokode = mysqli_fetch_array($promokode);
            $sale = $product['price'] * $promokode['percent'];
            $price = $product['price'] - $sale;
        }
?>
        <div class="tovar_basket">
            <div class="tovar_basket_img">
                <picture><img src="vendor/img/products/<? echo $product['name'] ?>/<? echo $product['image'] ?>" alt=""></picture>
            </div>
            <div class="tovar_basket_name">
                <div>
                    <h1>Артикул:</h1>
                    <p><? echo $product['article'] ?></p>
                </div>
                <p><? echo $product['name'] ?></p>
                <? if ($tovar['size'] != NULL) { ?><p>Размер: <?= $tovar['size'] ?> </p><? } ?>
            </div>
            <div class="tovar_basket_price">
                <p>
                    <?
                    if ($tovar['id_promokode'] == NULL) {
                        echo $product['price'];
                    } else {
                        echo $price;
                    }
                    ?>
                </p>
            </div>
            <div class="tovar_basket_kol-vo">
                <form method="POST" class="put_plus_basket">
                    <button name="button_minus" class="put_button_minus update_btn">-</button>
                    <input type="hidden" name="price" value="
                                    <? if ($tovar['id_promokode'] == NULL) {
                                        echo $product['price'];
                                    } else {
                                        echo $price;
                                    }
                                    ?>">
                    <input type="hidden" name="id" value="<? echo $tovar['id_product'] ?>">
                    <input type="hidden" name="size" value="<? echo $tovar['size'] ?>">
                    <input type="text" class="amount" name="amount" value="<? echo $tovar['amount'] ?>">
                    <button name="button_plus" class="put_button_plus update_btn">+</button>
                </form>
            </div>
            <div class="tovar_basket_total">
                <p class="p_t-b-t">
                    <? 
                    if ($tovar['id_promokode'] == NULL) {
                        echo $product['price'] * $tovar['amount'];
                    } else {
                        echo $price * $tovar['amount'];
                    }
                    ?>
                </p>
            </div>
            <form class="btn_close" action="vendor/action/basket/close.php" method="POST">
                <input type="hidden" name="id" value="<? echo $tovar['id'] ?>">
                <button name="close"><img src="vendor/img/icons/close_big.png" alt=""></button>
            </form>
        </div>
<? }
} ?>