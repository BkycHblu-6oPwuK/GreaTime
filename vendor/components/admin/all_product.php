<div class="admin_column">
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>image</th>
                <th>Категория</th>
                <th>Подкатегория</th>
                <th>Подкатегория_2</th>
                <th>Название</th>
                <th>Бренд</th>
                <th>Артикл</th>
                <th>Количество</th>
                <th>Цена</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
        <? 
        $products = mysqli_query($link,"SELECT * FROM `products` WHERE 1");
        while($prod = mysqli_fetch_array($products)){
        ?>
            <tr>
                <td><?=$prod['id']?></td>
                <td><img width="100px" height="100px" style="object-fit: contain;" src="vendor/img/products/<?=$prod['name']?>/<?=$prod['image']?>" alt=""></td>
                <td>
                    <?
                    $categ = mysqli_query($link,"SELECT * FROM `category` WHERE `id` = '{$prod['id_category']}'");
                    $categ = mysqli_fetch_array($categ);
                    echo $categ['name'];
                    ?>
                </td>
                <td>
                    <?
                    $categ = mysqli_query($link,"SELECT * FROM `subcategory` WHERE `id` = '{$prod['id_sub_cat']}'");
                    $categ = mysqli_fetch_array($categ);
                    echo $categ['name'];
                    ?>
                </td>
                <td>
                    <?
                    $categ = mysqli_query($link,"SELECT * FROM `sub_subcategory` WHERE `id` = '{$prod['id_sub_sub_cat']}'");
                    $categ = mysqli_fetch_array($categ);
                    echo $categ['name'];
                    ?>
                </td>
                <td><?=$prod['name']?></td>
                <td><?=$prod['brand']?></td>
                <td><?=$prod['article']?></td>
                <td><?=$prod['amount']?></td>
                <td><?=$prod['price']?></td>
                <td><a href="?upd_prod=<?=$prod['id']?>&upd=1">Изменить</a></td>
            </tr>
        <? } ?>
        </tbody>
    </table>
</div>