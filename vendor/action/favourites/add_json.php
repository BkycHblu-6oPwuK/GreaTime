<?
include '../../components/connect.php';
if($_POST["array"] != NULL){
    $myArray = $_POST["array"];
    $i = 0;
    for ($i; $i < count($myArray); $i++) {
        $products = mysqli_query($link, "SELECT * FROM `products` WHERE `id` = '{$myArray[$i]["id"]}'");
        while ($product = mysqli_fetch_array($products)) {
?>
            <div class="catalog_tovar">
                <form action="" method="POST" class="img_heart_tovar">
                    <button type="submit" class="button_heart_tovar" name="heart_tovar_delete"><img src="vendor/img/icons/close_big.png" alt=""></button>
                    <input type="hidden" name="id_prod" value="<? echo $product['id'] ?>">
                </form>
                <a href="page_tovar.php?id_tovar=<? echo $product['id'] ?>">
                    <div class="img_popular_tovar">
                        <picture><img src="vendor/img/products/<? echo $product['name'] ?>/<? echo $product['image'] ?>" alt=""></picture>
                    </div>
                </a>
                <div class="about_popular_tovar">
                    <div class="stars">
                        <img src="vendor/img/popular tovar/star_bacg.png" alt="">
                        <img src="vendor/img/popular tovar/star_bacg.png" alt="">
                        <img src="vendor/img/popular tovar/star_bacg.png" alt="">
                        <img src="vendor/img/popular tovar/star_bacg.png" alt="">
                        <img src="vendor/img/popular tovar/star.png" alt="">
                    </div>
                    <a href="page_tovar.php?id_tovar=<? echo $product['id'] ?>">
                        <p class="p_about_popular_tovar"><? echo $product['name'] ?></p>
                    </a>
                    <div class="price_popular_tovar">
                        <div class="form_price_popular_tovar">
                            <div class="price">
                                <p class="p_price"><? echo $product['price'] ?></p>
                                <img class="img_rub" src="vendor/img/popular tovar/XMLID 449.png" alt="">
                            </div>
                            <a href="page_tovar.php?id_tovar=<?= $product['id'] ?>" class="add_basket"><img class="img_add_basket" src="vendor/img/popular tovar/Buy.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
<?
        }
    }
} else {
     echo 'fav_null';
}
?>