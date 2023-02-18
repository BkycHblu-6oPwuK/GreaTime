<?php
session_start();
include "vendor/components/connect.php";
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
    <link rel="stylesheet" href="assets/css/log_reg.css">
    <title>Войти</title>
</head>

<body>
    <? include 'vendor/components/header.php' ?>
    <main class="all">
        <div class="login_form">
            <div class="login_top">
                <div class="login_button">
                    <button id="login_button_one">Вход</button>
                </div>
                <div class="registration_button">
                    <button id="reg_button_one">Регистрация</button>
                </div>
            </div>
            <div class="login_bottom">
                <form class="form_autorization" action="" method="post">
                    <input name="email" class="login_email" type="email" placeholder="Введите ваш E-mail" required>
                    <input name="password" class="login_password" type="text" placeholder="Введите ваш пароль" required>
                    <div class="autorization_button">
                        <button type="submit" name="login">Войти на сайт</button>
                    </div>
                    <div id="errLog"></div>
                </form>
            </div>
        </div>
        <div class="registration_form">
            <div class="reg_form_left">
                <div class="reg_form_top">
                    <div class="reg_form_log_reg">
                        <div class="login_button">
                            <button id="login_button_two">Вход</button>
                        </div>
                        <div class="registration_button">
                            <button id="reg_button_two">Регистрация</button>
                        </div>
                    </div>
                    <div class="reg_form_fiz_yor">
                        <div class="login_button_fiz">
                            <button>Физ. лицо</button>
                        </div>
                        <!-- <div class="registration_button_yor">
                            <button>Юр. лицо</button>
                        </div> -->
                    </div>
                </div>
                <div class="form_reg">
                    <form class="form_reg_fiz" action="" method="post">
                        <input name="email" class="reg_email" type="text" placeholder="Введите ваш E-mail" required>
                        <input name="password" class="reg_password" type="text" placeholder="Введите ваш пароль" required>
                        <input name="tel" class="reg_tel" type="text" placeholder="Введите номер телефона" required>
                        <input name="name" class="reg_fio" type="text" placeholder="Введите Имя" required>
                        <div class="registration_buttontwo">
                            <button type="submit" name="registration">Зарегистрироваться</button>
                        </div>
                        <div id="erconts"></div>
                    </form>
                    <form class="form_reg_org" action="" method="post">
                        <input name="email" class="reg_email" type="text" placeholder="Введите ваш E-mail" required>
                        <input name="password" class="reg_password" type="text" placeholder="Введите ваш пароль" required>
                        <input name="tel" class="reg_tel" type="text" placeholder="Введите номер телефона" required>
                        <input name="name" class="reg_fio" type="text" placeholder="Введите Имя" required>
                        <input name="inn" class="reg_inn" type="text" placeholder="Введите ИНН организации" required>
                        <div class="registration_buttontwo">
                            <button type="submit" name="registration">Зарегистрироваться</button>
                        </div>
                        <div id="erconts"></div>
                    </form>
                </div>
            </div>
            <div class="reg_form_rigt">
                <h1>Физ. лицо</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores unde, eum cumque obcaecati sit reiciendis pariatur architecto est, sunt quidem magnam facere eius atque quaerat. Sed quas fugiat voluptatum voluptates.</p>
                <!-- <h1>Юр. лицо</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Labore, asperiores omnis! Iusto voluptatibus assumenda ab corporis velit, culpa minima in iure officiis, excepturi atque id dolor temporibus labore tempore sint.</p> -->
            </div>
        </div>
    </main>
    <? include 'vendor/components/footer.php' ?>
</body>

</html>