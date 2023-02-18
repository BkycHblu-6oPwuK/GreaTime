<? 
include '../../components/connect.php';

if(isset($_POST['add_prod'])){
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $article = $_POST['article'];
    $desc = $_POST['desc'];
    $kol = $_POST['kol'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    
    if($_POST['subcategory'] == 0){
        $subcategory = NULL;
    } else {
        $subcategory = $_POST['subcategory'];
    }
    if($_POST['sub_subcategory'] == 0){
        $sub_subcategory = NULL;
    } else {
        $sub_subcategory = $_POST['sub_subcategory'];
    }
    mkdir("../../img/products/".$name."");
    $fileName =  md5($_FILES['img']['name'].time()*100) . ".jpg" ;
    $tempName = $_FILES ['img']['tmp_name'];
    $folder = "../../img/products/".$name."/" . $fileName ;
    mysqli_query($link,"INSERT INTO `products`(`id_category`, `id_sub_cat`, `id_sub_sub_cat`, `name`, `brand`, `article`, `description`, `amount`, `price`, `image`) VALUES ('$category','$subcategory','$sub_subcategory','$name','$brand','$article','$desc','$kol','$price','$fileName')");
    move_uploaded_file($tempName,$folder);
    if(isset($_POST['size'])){
        $id = mysqli_insert_id($link);
        $size[] = $_POST['size'];
        $amount[] = $_POST['amount'];
        for($i = 0;$i < count($size[0]);$i++){
            mysqli_query($link,"INSERT INTO `sizes`(`id_product`, `size`, `amount`) VALUES ('$id','{$size[0][$i]}','{$amount[0][$i]}')");
        }
    }
    header("Location:../../../admin.php?all_product");
}
?>