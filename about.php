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
    <link rel="stylesheet" href="assets/css/about.css">
    <title>Главная</title>
</head>
<body>
    <? include 'vendor/components/header.php' ?>
    <main class="all main_about">
        <h1>О нас</h1>
        <div class="about_block">
            <h1>Реквизиты</h1>
            <div class="requisites_block">
                <div>
                    <p><span>Инн:</span> 667027205771</p>
                    <p><span>ОГРН:</span> 310667022200016</p>
                    <p><span>БИК:</span> 046577964</p>
                    <p><span>Р/с:</span> 40802810638060000212</p>
                </div>
                <nav>
                    <p><span>Юр. адрес:</span> г. Екатеринбург ул. 40 лет ВЛКСМ, дом 16 - а, кв. 31 ФИЛИАЛ"ЕКАТЕРИНБУРГСКИЙ" ОАО"АЛЬФА-БАНК"</p>
                    <p><span>Свидетельство о гос. регистрации:</span> 66№006756503</p>
                    <p><span>к/с:</span> 30101810100000000964</p>
                </nav>
            </div>
            <div class="address_block">
                <div>
                    <section>
                        <h1>Адресс</h1>
                        <p>Екатеринбург, ул Волховская 20</p>
                    </section>
                    <nav>
                        <h1>Телефон</h1>
                        <div>
                            <a href="tel:+79047661843">+7 (904) 766-18-43</a>
                            <a href="tel:+79122137082">+7 (912) 213-70-82</a>
                        </div>
                    </nav>
                    <div>
                        <h1>Соц. сети</h1>
                        <div>
                            <a href=""><img src="vendor/img/icons/instagramBlue.png" alt=""></a>
                            <a href=""><img src="vendor/img/icons/facebookBlue.png" alt=""></a>
                            <a href=""><img src="vendor/img/icons/vkBlue.png" alt=""></a>
                            <a href=""><img src="vendor/img/icons/whatsapp.png" alt=""></a>
                            <a href=""><img src="vendor/img/icons/Telegram.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <nav>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d146513.6613295908!2d73.21605865270779!3d54.985795479661334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43aafde2f601090b%3A0x5eefc33861a69b1a!2z0J7QvNGB0LosINCe0LzRgdC60LDRjyDQvtCx0Lsu!5e0!3m2!1sru!2sru!4v1669906898950!5m2!1sru!2sru" width="680" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </nav>
            </div>
            <div class="about_company">
                <h1>О компании</h1>
                <div>
                    <div>
                        <p>Наша компания является надежным поставщиком спортивных товаров для профессионального и любительского спорта с 2010 года.</p>
                        <p>Мы являемся прямыми дистрибьюторами фабрик из разных стран и официальными представителями брендов, поэтому реализуем продукцию по лучшим ценам, всегда предлагаем широкий ассортимент продукции. У нас более 3000 категорий. 
                            Мы работаем по трём основным направлениям: розничные продажи, оптовые продажи, государственные закупки. </p>
                        <p>За 10 лет мы накопили огромный опыт в оптовом направлении. Сотрудники компании квалифицированно окажут любую консультацию, касающуюся предлагаемого товара. Мы заинтересованы в развитии наших партнеров и предлагаем прогрессивную систему скидок. </p>
                        <p>География нашей работы распространяется по всей России и СНГ: мы готовы оказать помощь в доставке в любой населенный пункт нашей страны.</p>
                    </div>
                    <nav>
                        <img src="vendor/img/about_company.png" alt="">
                    </nav>
                </div>
                <nav>
                    <iframe width="1180px" height="460px" src="https://www.youtube.com/embed/QSNa8U1yGrM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </nav>
            </div>
        </div>
    </main>
    <? include 'vendor/components/footer.php' ?>
</body>
</html>
