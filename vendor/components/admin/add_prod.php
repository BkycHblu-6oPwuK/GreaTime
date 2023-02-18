<div class="admin_column">
    <form class="form_upd" action="vendor/action/admin/add_product.php" method="post" enctype="multipart/form-data">
        <span>Название</span>
        <textarea name="name" id="" cols="40" rows="5" required></textarea>
        <span>Бренд</span>
        <input type="text" name="brand" value="" required>
        <span>Артикл</span>
        <input type="text" name="article" value="" required>
        <span>Описание</span>
        <textarea name="desc" id="" cols="40" rows="20" required></textarea>
        <span>Кол-во</span>
        <input type="text" name="kol" value="" required>
        <span>Цена</span>
        <input type="text" name="price" value="" required>
        <span>Категория</span>
        <div>
            <select name="category" id="" required>
                <?
                echo '<option selected="true" disabled="disabled">Выберите</option>';
                $category = mysqli_query($link, "SELECT * FROM `category` WHERE 1");
                while ($cat = mysqli_fetch_array($category)) {
                    echo '<option value="' . $cat['id'] . '">' . $cat['name'] . '</option>';
                }
                ?>
            </select>
        </div>
        <span>Подкатегория</span>
        <div>
            <select name="subcategory" id="">
                <?
                echo '<option value="0"">Без подкатегории</option>';
                $category = mysqli_query($link, "SELECT * FROM `subcategory` WHERE 1");
                while ($cat = mysqli_fetch_array($category)) {
                    echo '<option value="' . $cat['id'] . '">' . $cat['name'] . '</option>';
                }
                ?>
            </select>
        </div>
        <span>Подкатегория_2</span>
        <div>
            <select name="sub_subcategory" id="">
                <?
                echo '<option value="0"">Без подкатегории</option>';
                $category = mysqli_query($link, "SELECT * FROM `sub_subcategory` WHERE 1");
                while ($cat = mysqli_fetch_array($category)) {
                    echo '<option value="' . $cat['id'] . '">' . $cat['name'] . '</option>';
                }
                ?>
            </select>
        </div>
        <span>Фотография</span>
        <input type="file" name="img">
        <div class="add_block a_btn">Добавить размер</div>
        <div class="block_sizes">
            
        </div>
        <div class="adm_buttons">
            <input type="submit" name="add_prod" value="Добавить товар">
        </div>
    </form>
</div>