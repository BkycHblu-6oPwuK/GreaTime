<?
session_start();
include 'connect.php';
$_GET['page'] = $_POST['page'];
$page = $_POST['page'];
$kol = 5; //количество записей для вывода
$art = ($page * $kol)-$kol; // определяем, с какой записи нам выводить
$filename = '#';
$res = mysqli_query($link,"SELECT COUNT(*) FROM `reviews` WHERE `id_prod` = '{$_POST['id']}'");
$row = mysqli_fetch_row($res);
$total = $row[0]; // всего записей
$str_pag = ceil($total / $kol); //узнаем сколько страниц будет
$reviews = mysqli_query($link, "SELECT * FROM `reviews` WHERE `id_prod` = '{$_POST['id']}' LIMIT $art,$kol");
while ($rev = mysqli_fetch_array($reviews)) :
    $user = mysqli_query($link, "SELECT * FROM `users` WHERE `id` = '{$rev['id_user']}'");
    $users = mysqli_fetch_array($user);
?>
    <div class="tovar_rev">
        <div class="rev_header">
            <div class="rev_user_name"><? echo $users['name_user'] . ' ' . $users['surname_user'] ?></div>
            <div class="rev_date"><?= $rev['date'] ?></div>
        </div>
        <div class="stars">
            <? if ($rev['estimation'] == 1) : ?>
                <img src="vendor/img/popular tovar/star_bacg.png" alt="">
                <img src="vendor/img/popular tovar/star.png" alt="">
                <img src="vendor/img/popular tovar/star.png" alt="">
                <img src="vendor/img/popular tovar/star.png" alt="">
                <img src="vendor/img/popular tovar/star.png" alt="">
            <? endif; ?>
            <? if ($rev['estimation'] == 2) : ?>
                <img src="vendor/img/popular tovar/star_bacg.png" alt="">
                <img src="vendor/img/popular tovar/star_bacg.png" alt="">
                <img src="vendor/img/popular tovar/star.png" alt="">
                <img src="vendor/img/popular tovar/star.png" alt="">
                <img src="vendor/img/popular tovar/star.png" alt="">
            <? endif; ?>
            <? if ($rev['estimation'] == 3) : ?>
                <img src="vendor/img/popular tovar/star_bacg.png" alt="">
                <img src="vendor/img/popular tovar/star_bacg.png" alt="">
                <img src="vendor/img/popular tovar/star_bacg.png" alt="">
                <img src="vendor/img/popular tovar/star.png" alt="">
                <img src="vendor/img/popular tovar/star.png" alt="">
            <? endif; ?>
            <? if ($rev['estimation'] == 4) : ?>
                <img src="vendor/img/popular tovar/star_bacg.png" alt="">
                <img src="vendor/img/popular tovar/star_bacg.png" alt="">
                <img src="vendor/img/popular tovar/star_bacg.png" alt="">
                <img src="vendor/img/popular tovar/star_bacg.png" alt="">
                <img src="vendor/img/popular tovar/star.png" alt="">
            <? endif; ?>
            <? if ($rev['estimation'] == 5) : ?>
                <img src="vendor/img/popular tovar/star_bacg.png" alt="">
                <img src="vendor/img/popular tovar/star_bacg.png" alt="">
                <img src="vendor/img/popular tovar/star_bacg.png" alt="">
                <img src="vendor/img/popular tovar/star_bacg.png" alt="">
                <img src="vendor/img/popular tovar/star_bacg.png" alt="">
            <? endif; ?>
            <? if ($rev['estimation'] == 0) : ?>
                <img src="vendor/img/popular tovar/star.png" alt="">
                <img src="vendor/img/popular tovar/star.png" alt="">
                <img src="vendor/img/popular tovar/star.png" alt="">
                <img src="vendor/img/popular tovar/star.png" alt="">
                <img src="vendor/img/popular tovar/star.png" alt="">
            <? endif; ?>
        </div>
        <div class="rev_body">
            <div class="rev_plus">
                <div class="rev_title">Достоинства:</div>
                <div class="rev_desc"><?= $rev['plus'] ?></div>
            </div>
            <div class="rev_minus">
                <div class="rev_title">Недостатки:</div>
                <div class="rev_desc"><?= $rev['minus'] ?></div>
            </div>
            <div class="rev_comment">
                <div class="rev_title">Комментарий:</div>
                <div class="rev_desc"><?= $rev['comment'] ?></div>
            </div>
        </div>
    </div>
<?
endwhile;
if (mysqli_num_rows($reviews) == 0) :
?>
    <div style="text-align: center;">На данный товар нет отзывов</div>
<? 
endif; 
include 'nav_block_pagination.php';
?>
