<header>
    <div class="top">
        <div class="top_two">
            <div class="region"><span>Омск</span></div>
            <div class="for">
                <!-- <a href="#">Оптовым покупателям</a>
                <a href="#">Розничным покупателям</a>
                <a href="#">Регистрация для юр.лиц</a>
                <a href="#">Регистрация для физ.лиц</a> -->
                <a href="info_order.php">Как сделать заказ</a>
                <a href="info_delivery.php">Доставка и оплата</a>
                <a href="info_refund.php">Возврат</a>
                <a href="info_questions.php">Вопрос-ответ</a>
                <a href="tel:+79999999999">+7 (999) 999-99-99</a>
            </div>
        </div>
    </div>
    <div class="center">
        <div class="soc_net">
            <div class="soc_one"><a href=""><img src="vendor/img/icons/whatsapp.png" alt=""></a></div>
            <div class="soc_two"><a href=""><img src="vendor/img/icons/Telegram.png" alt=""></a></div>
        </div>
        <div class="logo">
            <a href="index.php"><h1 class="h_logo">GreaTime</h1></a>
            <?php 
             if($_SESSION['user']['admin']){
            ?>
            <div class="admin">
                <p><a class="a_admin" href="admin.php">Админ панель</a></p>
            </div>
            <? } ?>
        </div>
        <div class="about_us">
            <div class="about_company"><a href="about.php">О компании</a></div>
            <!-- <div class="contacts"><a href="">Контакты</a></div> -->
        </div>
    </div>
    <div class="bottom">
        <div class="catalog">
            <div class="button_catalog">
                <a class="button_catalog_show">Каталог</a>  <!--&id_category=11 -->
            </div>
            <div class="menu_filter">
                <div class="menu_filter_left">
                    <ul class="menu">
                        <? 
                        $categorys = mysqli_query($link,"SELECT * FROM `category` WHERE 1");
                        while($category = mysqli_fetch_array($categorys)):
                        $prod = mysqli_query($link,"SELECT * FROM `products` WHERE `id_category` = '{$category['id']}'");
                        if(mysqli_num_rows($prod) == 0){
                        continue;
                        }
                        ?>
                        <li class="menu_item"><a class="menu_link" href="catalog.php?page=1&id_category=<?= $category['id'] ?>"><span><?= $category['name'] ?></span></a></li>
                        <? endwhile; ?>
                    </ul>
                </div>
                <div class="menu_fulter_right">

                </div>
            </div>
        </div>
        <div class="presearch__overlay"></div>
        <div class="search search_box">
            <form action="" method="post">
                <div class="pole_search">
                    <input type="text" name="search" id="search" placeholder="Найти любимые товары" id="">
                </div>
                <!-- <div class="button_search">
                    <input type="submit" name="search" value="Найти">
                </div> -->
            </form>
            <div id="search_box-result"></div>
        </div>
        <? 
        $favour = mysqli_query($link,"SELECT * FROM `favourites` WHERE `id_user` = '{$_SESSION['user']['id']}'");
        $busket = mysqli_query($link,"SELECT * FROM `busket` WHERE `id_user` = '{$_SESSION['user']['id']}'");
        ?>
        <div class="login">
            <div class="profile">
                <?php 
                    if($_SESSION['user']):
                ?>
                <div class="block_icons_header"><a href="myProfile.php"><img src="vendor/img/icons/пользователь-96.png" alt=""></a></div>
                <p><a class="a_profile" href="vendor/action/login_reg/logOut.php">Выйти</a></p>
                <? else: ?>
                <div class="block_icons_header"><a href="login.php"><img src="vendor/img/icons/пользователь-96.png" alt=""></a></div>
                <p><a class="a_profile" href="login.php">Войти</a></p>
                <? endif; ?>
            </div>
            <? if(mysqli_num_rows($favour) == 0): ?>
            <a href="favourites.php?page=1" class="favorites">
                <div class="block_icons_header"><img src="vendor/img/icons/сердце-100.png" alt=""></div>
                <p class="a_profile">Избранное</p>
            </a>
            <? endif; ?>
            <? if(mysqli_num_rows($favour) > 0): ?>
            <a href="favourites.php?page=1" class="favorites">
                <div class="block_icons_header"><img src="vendor/img/icons/сердцеж.png" alt=""></div>
                <p class="a_profile">Избранное</p>
            </a>
            <? endif; ?>
            <? if(mysqli_num_rows($busket) == 0): ?>
            <a href="basket.php?id_usera=<?=$_SESSION['user']['id'] ?>" class="basket">
                <div class="block_icons_header"><img src="vendor/img/icons/корзина-96.png" alt=""></div>
                <p class="a_profile">Корзина</p>
            </a>
            <? endif; ?>
            <? if(mysqli_num_rows($busket) > 0): ?>
            <a href="basket.php?id_usera=<?=$_SESSION['user']['id'] ?>" class="basket">
                <div class="block_icons_header"><img src="vendor/img/icons/корзинаж.png" alt=""></div>
                <p class="a_profile">Корзина</p>
            </a>
            <? endif; ?>
        </div>
    </div>
</header>
