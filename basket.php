<?php
session_start();
    include "vendor/components/connect.php";
    $id_usera = $_SESSION['user']['id'];
    $tovars = mysqli_query($link, "SELECT * FROM `busket` WHERE `id_user` = '$id_usera'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/font/stylesheet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/basket.css">
    <link rel="stylesheet" href="assets/css/paga_tovar.css">
    <title>Корзина</title>
</head>

<body>
    <? include 'vendor/components/header.php' ?>
    <main class="all basket_all">
        <div class="form_basket">
            <? if(mysqli_num_rows($tovars)>0): ?>
            <div class="basket_top">
                <h1>Ваша корзина</h1>
            </div>
            <div class="basket_center">
                <div class="basket_pre-top">
                    <p class="basket_p_foto">Фото</p>
                    <p class="basket_p_name">Наименование товара</p>
                    <p class="basket_p_price">Цена за ед.</p>
                    <p class="basket_p_kol-vo">кол-во</p>
                    <p class="basket_p_total">Итого</p>
                </div>
                <div class="basket_paga">

                </div>
            </div>
            <div class="basket_bottom">
                <div class="bottom_price-top">
                    <div class="promokod">
                        <div>
                            <p>Промокод</p>
                            <form action="" class="form_promo" method="post">
                                <input type="text" name="promo" id="" placeholder="Промокод" required>
                                <input type="submit" class="apply_promo" value="Применить">
                            </form>
                            <div id="erconts"></div>
                            <?
                            $tova = mysqli_query($link, "SELECT * FROM `busket` WHERE `id_user` = '$id_usera'");
                            $tov = mysqli_fetch_array($tova);
                            if($tov['id_promokode'] != NULL){ 
                            ?>
                            <div class="summ_nds">
                                <p>Промокод применен</p>
                            </div>
                            <? } ?>
                        </div>
                    </div>
                    <div class="pre_itog_price">
                        <div class="itog_price">
                            <p>Сумма</p>
                            <span></span>
                        </div>
                        <div class="summ_nds">
                            <p>НДС 20% (20% включено)</p>
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="bottom_price-bot">
                    <p>Итоговая стоимость</p>
                    <span></span>
                </div>
                <form method="POST" action="vendor/action/basket/order.php" class="zakas">
                    <button type="submit" name="zakas">Оформить заказ</button>
                </form>
            </div>
            <? else: ?>
            <div class="basket_top">
                <h1>Ваша корзина пуста</h1>
            </div>
            <? endif; ?>
        </div>
    </main>
    <? include 'vendor/components/footer.php' ?>
</body>

</html>