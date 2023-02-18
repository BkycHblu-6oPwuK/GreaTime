<? 
include '../../components/connect.php';

if(isset($_POST['upd_prod'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $article = $_POST['article'];
    $desc = $_POST['desc'];
    $kol = $_POST['kol'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $prod = mysqli_query($link,"SELECT * FROM `products` WHERE `id` = '$id'");
    $prod = mysqli_fetch_array($prod);

    // переименовываем папку с картинкой товара если название товара было изменено, т.к. название папки соответствует названию товара.
    if($name != $prod['name']){
        rename("../../img/products/".$prod['name']."","../../img/products/".$name."");
    }

    if(file_exists($_FILES['img']['tmp_name']) || is_uploaded_file($_FILES['img']['tmp_name'])) {
        $fileName =  md5($_FILES['img']['name'].time()*100) . ".jpg" ;
        $tempName = $_FILES ['img']['tmp_name'];
        $folder = "../../img/products/".$_POST['name']."/" . $fileName ;
        unlink("../../img/products/".$_POST['name']."/" . $prod["image"]);
    } else {
        $fileName = $_POST['filename'];
    }

    if($_POST['subcategory'] == 0){
        $subcategory = "`id_sub_cat` = NULL";
    } else {
        $subcategory = "`id_sub_cat` = ".$_POST['subcategory']."";
    }

    if($_POST['sub_subcategory'] == 0){
        $sub_subcategory = "`id_sub_sub_cat` = NULL";
    } else {

        $sub_subcategory = "`id_sub_sub_cat` = ".$_POST['sub_subcategory']."";
    }

    mysqli_query($link,"UPDATE `products` SET `id_category`='$category',$subcategory,$sub_subcategory,`name`='$name',`brand`='$brand',`article`='$article',`description`='$desc',`amount`='$kol',`price`='$price',`image`='$fileName' WHERE `id` = '$id'");
    move_uploaded_file($tempName,$folder);
    header("Location:../../../admin.php?all_product");
}

if(isset($_POST['del_prod'])){
    mysqli_query($link,"DELETE FROM `products` WHERE `id` = '{$_POST['id']}'");
    header("Location:../../../admin.php?all_product");
}

if(isset($_POST['upd_size'])){
    mysqli_query($link,"UPDATE `sizes` SET `size`='{$_POST['sizes']}',`amount`='{$_POST['amount_size']}' WHERE `id` = '{$_POST['id']}'");
    header("Location:../../../admin.php?all_product");
}

if(isset($_POST['del_size'])){
    mysqli_query($link,"DELETE FROM `sizes` WHERE `id` = '{$_POST['id']}'");
    header("Location:../../../admin.php?all_product");
}

if(isset($_POST['add_size'])){
    $id = $_POST['id'];
    $size[] = $_POST['size'];
    $amount[] = $_POST['amount'];
    for($i = 0;$i < count($size[0]);$i++){
        mysqli_query($link,"INSERT INTO `sizes`(`id_product`, `size`, `amount`) VALUES ('$id','{$size[0][$i]}','{$amount[0][$i]}')");
    }
    header("Location:" . $_SERVER['HTTP_REFERER']);
}
?>