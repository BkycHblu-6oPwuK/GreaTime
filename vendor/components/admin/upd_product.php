<div class="admin_row">
    <?
    $prod = mysqli_query($link, "SELECT * FROM `products` WHERE `id` = '{$_GET['upd_prod']}'");
    $prod = mysqli_fetch_array($prod);
    ?>
    <form class="form_upd" action="vendor/action/admin/upd_product.php" method="post" enctype="multipart/form-data">
        <h1>Товар</h1>
        <input type="hidden" name="id" value="<?= $_GET['upd_prod'] ?>">
        <input type="hidden" name="filename" value="<?= $prod['image'] ?>">
        <span>Название</span>
        <textarea name="name" id="" cols="40" rows="5" required><?= $prod['name'] ?></textarea>
        <span>Бренд</span>
        <input type="text" name="brand" value="<?= $prod['brand'] ?>" required>
        <span>Артикл</span>
        <input type="text" name="article" value="<?= $prod['article'] ?>" required>
        <span>Описание</span>
        <textarea name="desc" id="" cols="40" rows="20" required><?= $prod['description'] ?></textarea>
        <span>Кол-во</span>
        <input type="text" name="kol" value="<?= $prod['amount'] ?>" required>
        <span>Цена</span>
        <input type="text" name="price" value="<?= $prod['price'] ?>" required>
        <span>Категория</span>
        <div>
            <select name="category" id="">
                <?
                if ($prod['id_category'] != NULL) {
                    $category = mysqli_query($link, "SELECT * FROM `category` WHERE `id` = '{$prod['id_category']}'");
                    $category = mysqli_fetch_array($category);
                    echo '<option value="' . $prod['id_category'] . '">' . $category['name'] . '</option>';
                } else {
                    echo '<option selected="true" disabled="disabled">Выберите</option>';
                }
                $category = mysqli_query($link, "SELECT * FROM `category` WHERE 1");
                while ($cat = mysqli_fetch_array($category)) {
                    if ($prod['id_category'] == $cat['id']) {
                        continue;
                    }
                    echo '<option value="' . $cat['id'] . '">' . $cat['name'] . '</option>';
                }
                ?>
            </select>
        </div>
        <span>Подкатегория</span>
        <div>
            <select name="subcategory" id="">
                <?
                if ($prod['id_sub_cat'] != NULL) {
                    $category = mysqli_query($link, "SELECT * FROM `subcategory` WHERE `id` = '{$prod['id_sub_cat']}'");
                    $category = mysqli_fetch_array($category);
                    echo '<option value="' . $prod['id_sub_cat'] . '">' . $category['name'] . '</option>';
                }
                echo '<option value="0"">Без подкатегории</option>';
                $category = mysqli_query($link, "SELECT * FROM `subcategory` WHERE 1");
                while ($cat = mysqli_fetch_array($category)) {
                    if ($prod['id_sub_cat'] == $cat['id']) {
                        continue;
                    }
                    echo '<option value="' . $cat['id'] . '">' . $cat['name'] . '</option>';
                }
                ?>
            </select>
        </div>
        <span>Подкатегория_2</span>
        <div>
            <select name="sub_subcategory" id="">
                <?
                if ($prod['id_sub_sub_cat'] != NULL) {
                    $category = mysqli_query($link, "SELECT * FROM `sub_subcategory` WHERE `id` = '{$prod['id_sub_sub_cat']}'");
                    $category = mysqli_fetch_array($category);
                    echo '<option value="' . $prod['id_sub_sub_cat'] . '">' . $category['name'] . '</option>';
                }
                echo '<option value="0"">Без подкатегории</option>';
                $category = mysqli_query($link, "SELECT * FROM `sub_subcategory` WHERE 1");
                while ($cat = mysqli_fetch_array($category)) {
                    if ($prod['id_sub_sub_cat'] == $cat['id']) {
                        continue;
                    }
                    echo '<option value="' . $cat['id'] . '">' . $cat['name'] . '</option>';
                }
                ?>
            </select>
        </div>
        <span>Фотография</span>
        <input type="file" name="img">
        <div class="adm_buttons">
            <input type="submit" name="upd_prod" value="Изменить">
            <input type="submit" name="del_prod" value="Удалить">
        </div>
    </form>
    <?
    $sizes = mysqli_query($link, "SELECT * FROM `sizes` WHERE `id_product` = '{$prod['id']}'");
    if (mysqli_num_rows($sizes) > 0) {
    ?>
        <div>
            <h1>Размеры</h1>
            <div class="block_column">
                <? while ($size = mysqli_fetch_array($sizes)) { ?>
                    <form class="form_upd" action="vendor/action/admin/upd_product.php" method="post">
                        <input type="hidden" name="id" value="<?= $size['id'] ?>">
                        <span>Размер</span>
                        <div><input type="text" name="sizes" value="<?= $size['size'] ?>"></div>
                        <span>Кол-во</span>
                        <div><input type="text" name="amount_size" value="<?= $size['amount'] ?>"></div>
                        <div class="adm_buttons">
                            <input type="submit" name="upd_size" value="Изменить">
                            <input type="submit" name="del_size" value="Удалить">
                        </div>
                    </form>
                <? } ?>
            </div>
            <div style="margin-top: 20px;">
                <div class="add_block a_btn">Добавить размер</div>
                <form class="form_upd" action="vendor/action/admin/upd_product.php" method="post">
                    <input type="hidden" name="id" value="<?= $_GET['upd_prod'] ?>">
                    <div class="block_sizes">

                    </div>
                    <input type="submit" name="add_size" class="btn" value="Добавить">
                </form>
            </div>
        </div>
    <? } ?>
</div>