<?php
session_start();
include "../../components/connect.php";

if(isset($_POST['add_prod'])){
    $article_prod = $_POST['article_prod'];
    $name_prod = $_POST['name_prod'];
    $description_prod = $_POST['description_prod'];
    $color_prod = $_POST['color_prod'];
    $size_prod = $_POST['size_prod'];
    $brand_prod = $_POST['brand_prod'];
    $availability_prod = $_POST['availability_prod'];
    $price_prod = $_POST['price_prod'];
    $priceOpt_prod = $_POST['priceOpt_prod'];
    $pre_prod = $_POST['pre_prod'];
    $pricePack_prod = $_POST['pricePack_prod'];
    $newFolder = mkdir("../../img/products/$name_prod");
    $fileName =  md5($_FILES['image_prod']['name'].time()*100) . ".jpg" ;
    $tempName = $_FILES ['image_prod']['tmp_name'];
    $folder = "../../img/products/$name_prod/" . $fileName ;
    mysqli_query($link,"INSERT INTO `products`(`article_prod`, `name_prod`, `description_prod`, `color_prod`, `size_prod`, `brand_prod`, 
    `availability_prod`, `price_prod`, `priceOpt_prod`, `pre_prod`, `pricePack_prod`, `image_prod`) 
    VALUES ('$article_prod', '$name_prod', '$description_prod', '$color_prod', '$size_prod', '$brand_prod', '$availability_prod', '$price_prod', 
    '$priceOpt_prod', '$pre_prod', '$pricePack_prod', '$fileName')");
    move_uploaded_file($tempName,$folder);
    header("Location:" . $_SERVER['HTTP_REFERER']);
}