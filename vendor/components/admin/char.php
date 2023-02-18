<div class="admin_column">
    <form class="form_upd" action="vendor/action/admin/char.php" method="post">
        <h1>Добавить название характеристики</h1>
        <input type="text" name="char" placeholder="Название" required>
        <input type="submit" name="add_char" value="Добавить">
    </form>
    <form class="form_upd" action="vendor/action/admin/char.php" method="post">
        <h1>Добавить характеристики товару</h1>
        <span>Товар</span>
        <select name="prod" id="">
            <? 
            $prods = mysqli_query($link,"SELECT * FROM `products` WHERE 1");
            while($prod = mysqli_fetch_array($prods)){
                echo '<option value="'.$prod['id'].'">'.$prod['name'].'</option>';
            }
            ?>
        </select>
        <span>Характеристика</span>
        <select name="char" id="">
            <? 
            $chars = mysqli_query($link,"SELECT * FROM `name_characteristic` WHERE 1");
            while($char = mysqli_fetch_array($chars)){
                echo '<option value="'.$char['id'].'">'.$char['name'].'</option>';
            }
            ?>
        </select>
        <input type="text" name="value" placeholder="значение" required>
        <input type="submit" name="add_char_prod" value="Добавить">
    </form>
</div>