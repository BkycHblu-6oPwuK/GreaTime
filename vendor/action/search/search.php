<?php
$dbh = new PDO('mysql:host=localhost;dbname=internat', 'root', 'root');
if (!empty($_POST['search'])) {
	$search = $_POST['search'];
	$search = mb_eregi_replace("[^a-zа-яё0-9]", '', $search);
	$search = trim($search);
 
	$sth = $dbh->prepare("SELECT `name`,`id` FROM `products` WHERE (`name` LIKE '%{$search}%') UNION SELECT `name`,`id` FROM `category` WHERE (`name` LIKE '%{$search}%') UNION SELECT `name`,`id` FROM `subcategory` WHERE (`name` LIKE '%{$search}%') UNION SELECT `name`,`id` FROM `sub_subcategory` WHERE (`name` LIKE '%{$search}%')");

	$sth->execute();
	$result = $sth->fetchAll(PDO::FETCH_ASSOC);
	if ($result) {
		?>
		<?php foreach ($result as $row): ?>
			<? 
				$sql = $dbh->query("SELECT * FROM `products` WHERE `id` = '{$row['id']}' and `name` = '{$row['name']}'");
				$num_row = $sql->rowCount();
				if($num_row == 1){
					$href = 'page_tovar.php?id_tovar='.$row['id'].'';
					$title = 'Товар';
				}else{
					$sql = $dbh->query("SELECT * FROM `category` WHERE `id` = '{$row['id']}' and `name` = '{$row['name']}'");
					$num_row = $sql->rowCount();
					if($num_row == 1){
						$href = 'catalog.php?page=1&id_category='.$row['id'].'';
						$title = 'Категория';
					}else{
						$sql = $dbh->query("SELECT * FROM `subcategory` WHERE `id` = '{$row['id']}' and `name` = '{$row['name']}'");
						$num_row = $sql->rowCount();
						if($num_row == 1){
							$sql->execute();
							$result = $sql->fetch(PDO::FETCH_ASSOC);
							$href = 'catalog.php?page=1&id_category='.$result['id_category'].'&id_sub_category='.$row['id'].'';
							$title = 'Категория';
						}else{
							$sql = $dbh->query("SELECT * FROM `sub_subcategory` WHERE `id` = '{$row['id']}' and `name` = '{$row['name']}'");
							$num_row = $sql->rowCount();
							if($num_row == 1){
								$sql->execute();
								$result = $sql->fetch(PDO::FETCH_ASSOC);
								$href = 'catalog.php?page=1&id_category='.$result['id_category'].'&id_sub_category='.$result['id_subcategory'].'&id_sub_sub_category='.$row['id'].'';
								$title = 'Категория';
							}
						}
					}
				}
			?>
			<div class="search_href_block"><a href="<?=$href?>"><div class="search_result"><?= $row['name'] ?> - <span><?=$title?></span></div></a></div>
		<?php endforeach; ?>
		<?php
	} else {
		echo '<div class="search_href_block">Ничего не найдено</div>';
	}
}