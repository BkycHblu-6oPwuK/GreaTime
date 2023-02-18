<?
include '../../components/connect.php';
$susubcategorys = mysqli_query($link,"SELECT * FROM `subcategory` WHERE `id_category` = '{$_GET['id_category']}' ");
while($susubcategory = mysqli_fetch_array($susubcategorys)):
$prod = mysqli_query($link,"SELECT * FROM `products` WHERE `id_sub_cat` = '{$susubcategory['id']}'");
if(mysqli_num_rows($prod) == 0){
    continue;
}
?>
<div class="menu_content">
    <ul class="menu menu_sub">
        <li class="menu_item_sub"><div><a class="menu_link link_sub" href="catalog.php?page=1&id_category=<?=$_GET['id_category']?>&id_sub_category=<?=$susubcategory['id']?>"><?=$susubcategory['name']?></a></div></li>
        <ul class="menu menu_sub_sub">
            <? 
            $sub_subcategorys = mysqli_query($link,"SELECT * FROM `sub_subcategory` WHERE `id_category` = '{$_GET['id_category']}' AND `id_subcategory` = '{$susubcategory['id']}' ");
            while($sub_subcategory = mysqli_fetch_array($sub_subcategorys)):
            $prod = mysqli_query($link,"SELECT * FROM `products` WHERE `id_sub_sub_cat` = '{$sub_subcategory['id']}'");
            if(mysqli_num_rows($prod) == 0){
            continue;
            }
            ?>
            <li class="menu_item_sub_sub"><a class="menu_link link_sub_sub" href="catalog.php?page=1&id_category=<?=$_GET['id_category']?>&id_sub_category=<?=$susubcategory['id']?>&id_sub_sub_category=<?=$sub_subcategory['id']?>"><span><?=$sub_subcategory['name']?></span></a></li>
            <? endwhile; ?>
        </ul>
    </ul>
</div>
<?
endwhile;
?>