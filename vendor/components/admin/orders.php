<? include '../connect.php'; ?>
<div class="admin_column">
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Метод доставки</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Телефон</th>
                <th>email</th>
                <th>Метод оплаты</th>
                <th>Итоговая цена</th>
                <th>Список товаров</th>
                <th>Статус заказа</th>
            </tr>
        </thead>
        <tbody>
            <?
            $orders = mysqli_query($link, "SELECT * FROM `orders` WHERE `status` = '{$_GET['status']}'");
            while ($order = mysqli_fetch_array($orders)) {
            if ($order['status'] == 2) {
                $order['status'] = 'Завершен';
            }
            if ($order['status'] == 3) {
                $order['status'] = 'Отменен';
            }
            ?>
                <tr>
                    <td><?= $order['id'] ?></td>
                    <td><?= $order['shipping_methods'] ?></td>
                    <td><?= $order['name'] ?></td>
                    <td><?= $order['surname'] ?></td>
                    <td><?= $order['telephone'] ?></td>
                    <td><?= $order['email'] ?></td>
                    <td><?= $order['payment_method'] ?></td>
                    <td><?= $order['price_itog'] ?></td>
                    <td>
                        <?
                        $order_lists = mysqli_query($link,"SELECT * FROM `order_list` WHERE `id_order` = '{$order['id']}'");
                        while($order_list = mysqli_fetch_array($order_lists)){
                            $products = mysqli_query($link,"SELECT * FROM `products` WHERE `id` = '{$order_list['id_products']}'");
                            while($prod = mysqli_fetch_array($products)){
                                    if($order_list['size'] != NULL){
                                        echo '<p>'.$prod['name'].' '.'<span>Размер:'.$order_list['size'].'</span>'.'</p>';
                                    } else {
                                        echo '<p>'.$prod['name'].'</p>';
                                    }
                                }
                            }
                        ?>
                    </td>
                    <td>
                        <? if ($_GET['status'] == 0 || $_GET['status'] == 1) { ?>
                            <select data-id="<?= $order['id'] ?>" name="status" id="">
                                <?
                                if ($_GET['status'] == 0) {
                                    echo '<option value="0">В сборке</option><option value="1">Готов к получению</option><option value="2">Завершен</option><option value="3">Отмена</option>';
                                }
                                if ($_GET['status'] == 1) {
                                    echo '<option value="1">Готов к получению</option><option value="2">Завершен</option><option value="3">Отмена</option>';
                                }
                                ?>
                            </select>
                        <? } elseif($_GET['status'] == 2 || $_GET['status'] == 3) {
                            echo '<div>' . $order['status'] . '<div>';
                        }
                        ?>
                    </td>
                </tr>
            <? } ?>
        </tbody>
    </table>
</div>