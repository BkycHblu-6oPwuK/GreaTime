<?php
session_start();
include "vendor/components/connect.php";
$users = mysqli_query($link,"SELECT * FROM `users` WHERE `id` = '{$_SESSION['user']['id']}'");
$user = mysqli_fetch_array($users);
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
    <link rel="stylesheet" href="assets/css/profile.css">
    <title>Главная</title>
</head>
<body>
    <? include 'vendor/components/header.php' ?>
    <main class="all main_profile myprofile">
        <div>
            <button class="myProfile_button">Мой профиль</button>
            <button class="myOrders_button">Мои заказы</button>
        </div>
        <nav>
            <h1 class="h1_Myprofile">Мой профиль</h1>
            <div>
                <div>
                    <p>Имя</p>
                    <p>Фамилия</p>
                    <p>Телефон</p>
                    <p>Email</p>
                    <p>Адрес</p>
                </div>
                <nav>
                    <p><?= $user['name_user']; ?></p>
                    <p><? if($user['surname_user'] != NULL){ echo $user['surname_user']; } else { echo '-' ; } ?></p>
                    <p><?= $user['tel_user']; ?></p>
                    <p><?= $user['email_user']; ?></p>
                    <p><? if($user['city_user'] != NULL){ echo $user['city_user']; } else { echo '-' ; } ?></p>
                    <button class="profileUpd_button">Редактировать</button>
                </nav>
            </div>
        </nav>
        <section class="updProfile_block">
            <h1 class="h1_Myprofile">Редактировать профиль</h1>
            <div>
                <div>
                    <p>Имя<span>*</span></p>
                    <p>Фамилия<span></span></p>
                    <p>Телефон<span>*</span></p>
                    <p>Email<span>*</span></p>
                    <p>Адрес</p>
                </div>
                <form class="form_profileUpd" action="" method="post">
                    <input type="text" name="name" placeholder="Имя" value="<?= $user['name_user']; ?>" required>
                    <input type="text" name="surname" placeholder="Фамилия" value="<?= $user['surname_user']; ?>">
                    <input type="text" name="tel" placeholder="Номер телефона" value="<?= $user['tel_user']; ?>" required>
                    <input type="email" name="email" placeholder="Email" value="<?= $user['email_user']; ?>" required>
                    <input type="text" name="home" placeholder="Улица, дом, квартира" value="<?= $user['street_user']; ?>">
                    <input type="text" name="city" placeholder="Город" value="<?= $user['city_user']; ?>">
                    <input type="text" name="oblast" placeholder="Регион" value="<?= $user['region_user']; ?>">
                    <input type="number" name="index" placeholder="Почтовый индекс" value="<?= $user['postal_code_user']; ?>">
                    <input type="text" name="country" placeholder="Страна" value="<?= $user['country_user']; ?>">
                    <div>
                        <div class="profileUpd_button profileUpdNon_button"><span>Отмена</span></div>
                        <button name="profile_upd" class="profileUpd_button">Редактировать</button>
                    </div>
                </form>
            </div>
        </section>
        <input type="hidden" value="123">
    </main>
    <? include 'vendor/components/footer.php' ?>
</body>
</html>