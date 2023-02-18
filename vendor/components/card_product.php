<?
$reviews = mysqli_query($link,"SELECT AVG(`estimation`) FROM `reviews` WHERE `id_prod` = '{$product['id']}'");
$size = mysqli_query($link,"SELECT * FROM `sizes` WHERE `id_product` = '{$product['id']}' AND `amount` != 0");
$size = mysqli_fetch_array($size);
?>
<div class="<?=$name?>">
    <form method="POST" class="form_add_fav img_heart_tovar">
        <button type="submit" class="button_heart_tovar" name="<?if(isset($_SESSION['user'])){echo 'heart_tovar';}else{echo 'heart_tov';}?>"><img src="vendor/img/icons/сердце-100.png" alt=""></button>
        <input type="hidden" name="id_prod" value="<? echo $product['id'] ?>">
    </form>
    <a href="page_tovar.php?id_tovar=<? echo $product['id'] ?>">
        <div class="img_popular_tovar">
            <picture><img src="vendor/img/products/<? echo $product['name'] ?>/<? echo $product['image'] ?>" alt=""></picture>
        </div>
    </a>
    <div class="about_popular_tovar">
        <? 
        $rev = mysqli_fetch_array($reviews);
        include 'block_stars_review.php' 
        ?>
        <a href="page_tovar.php?id_tovar=<? echo $product['id'] ?>">
            <p class="p_about_popular_tovar"><? echo $product['name'] ?></p>
        </a>
        <div class="price_popular_tovar">
            <form class="form_price_popular_tovar" method="post">
                <div class="price">
                    <p class="p_price"><? echo $product['price'] ?></p>
                    <img class="img_rub" src="vendor/img/popular tovar/XMLID 449.png" alt="">
                </div>
                <input type="hidden" name="size" value="<?= $size['size'] ?>">
                <input type="hidden" name="amount" value="1">
                <input type="hidden" name="id_prod" value="<? echo $product['id'] ?>">
                <button name="add_basket" class="add_basket"><img class="img_add_basket" src="vendor/img/popular tovar/Buy.png" alt=""></button>
            </form>
        </div>
    </div>
</div>