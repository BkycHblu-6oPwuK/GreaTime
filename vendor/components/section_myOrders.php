<?
session_start();
include 'connect.php';
if(isset($_POST['page'])){
    $_GET['page'] = $_POST['page'];
    $page = $_POST['page'];
}else{
    $_GET['page'] = 1;
    $page = 1;
}
$kol = 10; //количество записей для вывода
$art = ($page * $kol)-$kol; // определяем, с какой записи нам выводить
$filename = '#';
$res = mysqli_query($link,"SELECT COUNT(*) FROM `orders` WHERE `id_user` = {$_SESSION['user']['id']}");
$row = mysqli_fetch_row($res);
$total = $row[0]; // всего записей
$str_pag = ceil($total / $kol); //узнаем сколько страниц будет
$orders = mysqli_query($link,"SELECT * FROM `orders` WHERE `id_user` = {$_SESSION['user']['id']} ORDER BY `id` DESC LIMIT $art,$kol");
if(mysqli_num_rows($orders) > 0): 
?>
    <h1 class="h1_Myprofile">Мои заказы</h1>
    <input type="hidden" class="page" value="<?=$_POST['page']?>">
    <? while($order = mysqli_fetch_array($orders)): ?>
    <div class="block_my_order">
        <div class="my_order_header">
            <div class="info_my_order">
                <div class="about_order_arr"><img src="vendor/img/icons/pngwing.png" alt=""></div>
                <div class="name_my_order">Заказ GG-<?= $order['id'] ?> от <?= $order['data'] ?></div>
                <div class="status_my_order"><? if($order['status'] == '0'){echo 'В сборке';}elseif($order['status'] == '1'){echo 'Готов к получению';}elseif($order['status'] == '2'){echo'Завершен';}elseif($order['status'] == '3'){echo'Отменен';} ?></div>
                <div class="name_my_order">Оплата:</div><? if($order['payment_method'] == 'Онлайн оплата'){ ?><div class="status_my_order"><? if($order['status_payment'] == '0'){echo 'Не оплачен';}elseif($order['status'] == '1'){echo 'Оплачен';}?></div><? } else { ?><div class="status_my_order"><?=$order['payment_method']?></div><? } ?>
            </div>
            <form method="POST" action="" class="order_header_del_btn">
                <? if($order['status'] == '0' || $order['status'] == '1' ){ ?>
                <input type="hidden" name="id_order_canc" value="<?= $order['id'] ?>">
                <input type="submit" name="canc_order" class="btn_del_order" value="Отменить">
                <? } else { ?>
                <input type="hidden" name="id_order_del" value="<?= $order['id'] ?>">
                <input type="submit" name="del_order" class="btn_del_order" value="Удалить">
                <? } ?>
            </form>
        </div>
        <div class="order_body order_body_click">
            <div class="images_products">
                <? 
                $order_lists = mysqli_query($link,"SELECT * FROM `order_list` WHERE `id_order` = '{$order['id']}'");
                while($order_list = mysqli_fetch_array($order_lists)):
                $products = mysqli_query($link,"SELECT * FROM `products` WHERE `id` = '{$order_list['id_products']}'");
                while($product = mysqli_fetch_array($products)):
                ?>
                <div class="image_product">
                    <img src="vendor/img/products/<?=$product['name']?>/<?=$product['image']?>" alt="">
                </div>
                <? 
                endwhile;
                endwhile; 
                ?>
            </div>
            <div class="order_price_block">
                <div class="order_price">Итого: <?=$order['price_itog']?> ₽</div>
                <div class="order_number_prod">Товаров: <?=mysqli_num_rows($order_lists);?> шт.</div>
            </div>
        </div>
        <div class="order_body order_details">
            <div class="order_conditions">
                <div class="order_conditions_block">
                    <span>Способ получения:</span>
                    <span><?=$order['shipping_methods']?></span>
                </div>
                <? if($order['shipping_methods'] == 'Курьером'): ?>
                <div class="order_conditions_block">
                    <span>Адрес доставки:</span>
                    <span><? echo $order['street'] . ' ' .$order['home'] . ' ' .$order['entrance'] . ' ' .$order['flat']?></span>
                </div>
                <? endif; ?>
                <div class="order_conditions_block">
                    <span>Телефон получателя:</span>
                    <span><?=$order['telephone']?></span>
                </div>
            </div>
            <div class="order_price_block">
                <div class="order_price">Итого: <?=$order['price_itog']?> ₽</div>
            </div>
        </div>
        <?
        $order_lists = mysqli_query($link,"SELECT * FROM `order_list` WHERE `id_order` = '{$order['id']}'");
        while($order_list = mysqli_fetch_array($order_lists)):
        $products = mysqli_query($link,"SELECT * FROM `products` WHERE `id` = '{$order_list['id_products']}'");
        while($product = mysqli_fetch_array($products)):
        ?>
        <div class="order_body order_details_prod order_details">
            <div class="image_product">
                <a href="page_tovar.php?id_tovar=<?=$product['id']?>"><img src="vendor/img/products/<?=$product['name']?>/<?=$product['image']?>" alt=""></a>
            </div>
            <div class="order_product_desc">
                <div class="product_name"><a href="page_tovar.php?id_tovar=<?=$product['id']?>"><?=$product['name']?></a></div>
                <? if($order_list['size'] != 0): ?>
                <div class="product_num">
                    <span>Размер:</span>
                    <span><?=$order_list['size']?></span>
                </div>
                <? endif; ?>
                <div class="product_num">
                    <span>Артикул товара:</span>
                    <span><?=$product['article']?></span>
                </div>
                <? 
                $reviews = mysqli_query($link,"SELECT * FROM `reviews` WHERE `id_user` = '{$_SESSION['user']['id']}' AND `id_prod` = '{$product['id']}'");
                if(mysqli_num_rows($reviews) == 0):
                if($order['status'] == '2'): 
                ?>
                <div class="product_rev">
                    <a href="add_review.php?id_tovar=<?=$product['id']?>">Оставить отзыв</a>
                </div>
                <? 
                endif;
                ;else:
                $review = mysqli_fetch_array($reviews);
                ?>
                <div class="product_rev">
                    <a href="add_review.php?id_tovar=<?=$product['id']?>">Изменить отзыв</a>
                </div>
                <? endif; ?>
            </div>
            <div class="order_price_block">
                <? 
                if($order_list['id_promokode'] != NULL){
                    $promokode = mysqli_query($link,"SELECT * FROM `promokode` WHERE `id` = '{$order_list['id_promokode']}'");
                    $promokode = mysqli_fetch_array($promokode);
                    $sale = $product['price'] * $promokode['percent']; 
                    $price = $product['price'] - $sale; 
                }
                ?>
                <div class="order_price">Цена: <?if($order_list['id_promokode'] == NULL){ echo $order_list['amount']*$product['price']; } else { echo $order_list['amount']*$price;} ?></div>
                <div class="order_number_prod"><span class="order_prod_amount"><?= $order_list['amount']?></span> шт. x <span class="order_prod_price"><?if($order_list['id_promokode'] == NULL){ $product['price']; } else { echo $price;} ?></span> ₽</div>
            </div>
        </div>
        <? 
        endwhile;
        endwhile; 
        ?>
    </div>
    <? endwhile; ?>
    <? else: ?>
    <h1 class="h1_Myprofile">У вас нет заказов</h1>
    <? 
    endif;
    include 'nav_block_pagination.php';
    ?>
    